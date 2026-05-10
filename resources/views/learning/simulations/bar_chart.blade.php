{{-- 
    FILE: resources/views/learning/simulations/bar_chart.blade.php
    DESC: Panel Kontrol & Logika Three.js Khusus Diagram Batang
--}}

{{-- A. PANEL KONTROL HTML --}}
<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">
    {{-- Efek Glow Background --}}
    <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>

    {{-- Header Kontrol --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 relative z-10 gap-4">
        <h4 class="text-white font-bold flex items-center gap-2 text-lg">
            <span>🎛️</span> Laboratorium Data
        </h4>
        
        {{-- TOMBOL TAMBAH / KURANG --}}
        <div class="flex items-center gap-2 bg-gray-800 p-1 rounded-lg border border-gray-700">
            <button id="btnRemoveBar" class="px-3 py-1.5 rounded-md bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all text-xs font-bold flex items-center gap-1 disabled:opacity-30 disabled:cursor-not-allowed">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4"></path></svg>
                Hapus
            </button>
            <span class="text-gray-500 text-xs px-1" id="barCountDisplay">3 Data</span>
            <button id="btnAddBar" class="px-3 py-1.5 rounded-md bg-green-500/10 text-green-400 hover:bg-green-500 hover:text-white transition-all text-xs font-bold flex items-center gap-1 disabled:opacity-30 disabled:cursor-not-allowed">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </button>
        </div>
    </div>
    
    {{-- CONTAINER SLIDER DINAMIS --}}
    <div id="sliders-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
        {{-- Slider akan digenerate otomatis oleh Javascript --}}
    </div>
</div>

{{-- B. LOGIKA JAVASCRIPT --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cek container & Three.js
        const barContainer = document.getElementById('three-canvas-container');
        
        if (barContainer && typeof THREE !== 'undefined') {
            
            // Hide Loading
            const loadingText = document.getElementById('loading-indicator');
            if(loadingText) loadingText.style.display = 'none';

            // --- 1. SETUP THREE.JS ---
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x050505); 
            scene.fog = new THREE.FogExp2(0x050505, 0.03);

            const camera = new THREE.PerspectiveCamera(50, barContainer.clientWidth / barContainer.clientHeight, 0.1, 1000);
            camera.position.set(0, 12, 18);
            camera.lookAt(0, 5, 0);

            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(barContainer.clientWidth, barContainer.clientHeight);
            renderer.shadowMap.enabled = true;
            renderer.shadowMap.type = THREE.PCFSoftShadowMap;
            barContainer.appendChild(renderer.domElement);

            // --- 2. LIGHTING ---
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.3);
            scene.add(ambientLight);

            const spotLight = new THREE.SpotLight(0xffffff, 1.2);
            spotLight.position.set(10, 20, 10);
            spotLight.angle = Math.PI / 4;
            spotLight.penumbra = 0.5;
            spotLight.castShadow = true;
            scene.add(spotLight);

            // --- 3. ENVIRONMENT ---
            const gridHelper = new THREE.GridHelper(50, 50, 0x333333, 0x111111);
            scene.add(gridHelper);
            
            const planeGeo = new THREE.PlaneGeometry(50, 50);
            const planeMat = new THREE.MeshStandardMaterial({ color: 0x050505, roughness: 0.1, metalness: 0.5 });
            const plane = new THREE.Mesh(planeGeo, planeMat);
            plane.rotation.x = -Math.PI / 2;
            plane.position.y = -0.01;
            plane.receiveShadow = true;
            scene.add(plane);

            // --- 4. STATE MANAGEMENT ---
            let bars = []; 
            const maxBars = 8;
            const minBars = 1;
            const colors = [0xef4444, 0x3b82f6, 0xeab308, 0x10b981, 0x8b5cf6, 0xec4899, 0x06b6d4, 0xf97316]; 
            const colorHexes = ["#ef4444", "#3b82f6", "#eab308", "#10b981", "#8b5cf6", "#ec4899", "#06b6d4", "#f97316"];

            // --- 5. HELPER FUNCTIONS ---
            function createTextSprite(message, colorStr) {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = 256; canvas.height = 128;
                ctx.font = 'Bold 40px Arial';
                ctx.fillStyle = colorStr; 
                ctx.textAlign = 'center';
                ctx.shadowColor = "rgba(0,0,0,0.8)";
                ctx.shadowBlur = 4;
                ctx.fillText(message, 128, 70); 
                const texture = new THREE.CanvasTexture(canvas);
                const sprite = new THREE.Sprite(new THREE.SpriteMaterial({ map: texture }));
                sprite.scale.set(6, 3, 1);
                return sprite;
            }

            function addBar(initialValue = 5, label = "Data") {
                const idx = bars.length;
                const color = colors[idx % colors.length];
                const colorStr = colorHexes[idx % colorHexes.length];
                const finalLabel = label + " " + (idx + 1);

                // A. Buat 3D Object
                const group = new THREE.Group();
                const geometry = new THREE.BoxGeometry(2, 1, 2);
                geometry.translate(0, 0.5, 0);
                const material = new THREE.MeshStandardMaterial({ 
                    color: color, roughness: 0.2, metalness: 0.1, emissive: color, emissiveIntensity: 0.2 
                });
                const bar = new THREE.Mesh(geometry, material);
                bar.castShadow = true; bar.receiveShadow = true;
                group.add(bar);

                const edges = new THREE.EdgesGeometry(geometry);
                const line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0.5 }));
                bar.add(line);

                const sprite = createTextSprite(finalLabel, colorStr);
                sprite.position.y = 2;
                group.add(sprite);
                scene.add(group);

                // B. Buat UI Slider (HTML)
                const sliderContainer = document.getElementById('sliders-container');
                const sliderDiv = document.createElement('div');
                sliderDiv.className = "relative group animate-fade-in";
                sliderDiv.id = `slider-group-${idx}`;
                sliderDiv.innerHTML = `
                    <div class="flex justify-between items-center mb-2">
                        <input type="text" id="labelInput-${idx}" value="${finalLabel}" class="bg-transparent border-b border-gray-600 focus:border-white text-[${colorStr}] font-bold text-xs uppercase tracking-wider w-24 focus:outline-none transition-colors" style="color:${colorStr}">
                        <span class="text-xs text-gray-500">Idx ${idx+1}</span>
                    </div>
                    <input type="range" id="slider-${idx}" min="1" max="15" value="${initialValue}" step="0.1"
                        class="w-full h-2 bg-gray-800 rounded-lg appearance-none cursor-pointer hover:opacity-80 transition-all"
                        style="accent-color: ${colorStr}">
                    <div class="mt-2 flex justify-between items-center">
                        <span class="text-2xl font-black text-white" id="valDisplay-${idx}">${initialValue}</span>
                        <span class="text-[10px] text-gray-600">Freq</span>
                    </div>
                `;
                sliderContainer.appendChild(sliderDiv);

                // C. Simpan ke Array State
                const barObj = { 
                    group, bar, sprite, 
                    targetHeight: initialValue,
                    colorStr, domId: `slider-group-${idx}`
                };
                bars.push(barObj);

                // D. Event Listeners
                document.getElementById(`slider-${idx}`).addEventListener('input', (e) => {
                    barObj.targetHeight = parseFloat(e.target.value);
                    document.getElementById(`valDisplay-${idx}`).innerText = barObj.targetHeight;
                });

                document.getElementById(`labelInput-${idx}`).addEventListener('input', (e) => {
                    group.remove(sprite);
                    barObj.sprite = createTextSprite(e.target.value, colorStr);
                    group.add(barObj.sprite);
                });

                repositionBars();
                updateButtonState();
            }

            function removeBar() {
                if (bars.length <= minBars) return;
                const lastBar = bars.pop();
                scene.remove(lastBar.group);
                const sliderDiv = document.getElementById(lastBar.domId);
                if(sliderDiv) sliderDiv.remove();
                repositionBars();
                updateButtonState();
            }

            function repositionBars() {
                const spacing = 4;
                const totalWidth = (bars.length - 1) * spacing;
                const startX = -totalWidth / 2; 

                bars.forEach((b, i) => {
                    b.group.position.x = startX + (i * spacing);
                });
                document.getElementById('barCountDisplay').innerText = bars.length + " Data";
            }

            function updateButtonState() {
                document.getElementById('btnAddBar').disabled = bars.length >= maxBars;
                document.getElementById('btnRemoveBar').disabled = bars.length <= minBars;
            }

            // --- 6. INIT ---
            addBar(5, "Apel");
            addBar(8, "Jeruk");
            addBar(12, "Mangga");

            // Button Events
            document.getElementById('btnAddBar').addEventListener('click', () => addBar(5, "Data"));
            document.getElementById('btnRemoveBar').addEventListener('click', removeBar);

            // --- 7. ANIMATION LOOP ---
            function animate() {
                requestAnimationFrame(animate);
                bars.forEach(b => {
                    b.bar.scale.y += (b.targetHeight - b.bar.scale.y) * 0.1;
                    b.sprite.position.y = b.bar.scale.y + 1;
                });
                scene.rotation.y = Math.sin(Date.now() * 0.0003) * 0.05;
                renderer.render(scene, camera);
            }
            animate();

            // Resize
            window.addEventListener('resize', () => {
                if(barContainer) {
                    renderer.setSize(barContainer.clientWidth, barContainer.clientHeight);
                    camera.aspect = barContainer.clientWidth / barContainer.clientHeight;
                    camera.updateProjectionMatrix();
                }
            });
        }
    });
</script>