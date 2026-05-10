{{-- 
    FILE: resources/views/learning/simulations/distance_euclidean.blade.php
    DESC: Simulasi Penghitung Jarak 3D (Euclidean Distance Calculator)
--}}

{{-- A. PANEL KONTROL & RUMUS --}}
<div class="mt-6 flex flex-col lg:flex-row gap-6">
    
    {{-- KONTROL SLIDER (KIRI) --}}
    <div class="lg:w-1/3 bg-[#0f1115] p-5 rounded-xl border border-gray-700 shadow-2xl h-fit">
        <h4 class="text-white font-bold mb-4 flex items-center gap-2">
            <span>🎛️</span> Koordinat Titik
        </h4>

        {{-- Titik A (Merah) --}}
        <div class="mb-6 p-3 bg-red-900/20 border border-red-900/50 rounded-lg">
            <div class="flex justify-between mb-2">
                <span class="text-red-400 font-bold text-xs">🔴 TITIK A (x1, y1, z1)</span>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span class="text-gray-500 text-xs w-4">X</span>
                <input type="range" id="ax" min="-10" max="10" value="-5" step="0.1" class="flex-1 h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-red-500">
                <span id="val_ax" class="text-xs text-white w-6 text-right">-5</span>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span class="text-gray-500 text-xs w-4">Y</span>
                <input type="range" id="ay" min="0" max="10" value="0" step="0.1" class="flex-1 h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-red-500">
                <span id="val_ay" class="text-xs text-white w-6 text-right">0</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-500 text-xs w-4">Z</span>
                <input type="range" id="az" min="-10" max="10" value="-5" step="0.1" class="flex-1 h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-red-500">
                <span id="val_az" class="text-xs text-white w-6 text-right">-5</span>
            </div>
        </div>

        {{-- Titik B (Biru) --}}
        <div class="p-3 bg-blue-900/20 border border-blue-900/50 rounded-lg">
            <div class="flex justify-between mb-2">
                <span class="text-blue-400 font-bold text-xs">🔵 TITIK B (x2, y2, z2)</span>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span class="text-gray-500 text-xs w-4">X</span>
                <input type="range" id="bx" min="-10" max="10" value="5" step="0.1" class="flex-1 h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-500">
                <span id="val_bx" class="text-xs text-white w-6 text-right">5</span>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span class="text-gray-500 text-xs w-4">Y</span>
                <input type="range" id="by" min="0" max="10" value="5" step="0.1" class="flex-1 h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-500">
                <span id="val_by" class="text-xs text-white w-6 text-right">5</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-500 text-xs w-4">Z</span>
                <input type="range" id="bz" min="-10" max="10" value="5" step="0.1" class="flex-1 h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-500">
                <span id="val_bz" class="text-xs text-white w-6 text-right">5</span>
            </div>
        </div>
    </div>

    {{-- DISPLAY RUMUS (KANAN) --}}
    <div class="lg:w-2/3 bg-[#0f1115] p-5 rounded-xl border border-gray-700 shadow-2xl flex flex-col justify-center items-center">
        <h4 class="text-gray-400 text-xs uppercase tracking-widest mb-4">Kalkulasi Real-time</h4>
        
        <div class="text-white font-mono text-lg md:text-xl lg:text-2xl text-center leading-relaxed">
            <div class="mb-4">
                <span class="text-gray-500">d = </span> 
                √<span class="border-t border-gray-500 pt-1">
                    (<span id="f_x2" class="text-blue-400">5</span> - <span id="f_x1" class="text-red-400">-5</span>)² + 
                    (<span id="f_y2" class="text-blue-400">5</span> - <span id="f_y1" class="text-red-400">0</span>)² + 
                    (<span id="f_z2" class="text-blue-400">5</span> - <span id="f_z1" class="text-red-400">-5</span>)²
                </span>
            </div>
            <div class="mb-4 text-gray-400 text-sm">
                ↓
            </div>
            <div>
                <span class="text-gray-500">d = </span> 
                <span class="text-yellow-400 font-bold text-3xl" id="resultDistance">0.00</span>
                <span class="text-xs text-gray-600 ml-1">Satuan</span>
            </div>
        </div>
    </div>
</div>

{{-- B. LOGIKA THREE.JS --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById('three-canvas-container');
        
        if (container && typeof THREE !== 'undefined' && container.dataset.simType === 'simulasi-3d-jarak-euclidean') {
            
            const loadingText = document.getElementById('loading-indicator');
            if(loadingText) loadingText.style.display = 'none';

            // --- 1. SETUP SCENE ---
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x0a0a0a);
            scene.fog = new THREE.FogExp2(0x0a0a0a, 0.02);

            const camera = new THREE.PerspectiveCamera(50, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.set(20, 15, 20);
            camera.lookAt(0, 0, 0);

            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.shadowMap.enabled = true;
            container.appendChild(renderer.domElement);

            // --- 2. ENVIRONMENT ---
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);
            const dirLight = new THREE.DirectionalLight(0xffffff, 1);
            dirLight.position.set(10, 20, 10);
            dirLight.castShadow = true;
            scene.add(dirLight);

            const gridHelper = new THREE.GridHelper(30, 30, 0x444444, 0x111111);
            scene.add(gridHelper);

            // Sumbu XYZ Helper
            const axesHelper = new THREE.AxesHelper(5);
            scene.add(axesHelper);

            // --- 3. OBJECTS ---
            
            // Sphere A (Merah)
            const geoA = new THREE.SphereGeometry(0.8, 32, 32);
            const matA = new THREE.MeshStandardMaterial({ color: 0xff4444, roughness: 0.2, metalness: 0.5, emissive: 0x330000 });
            const sphereA = new THREE.Mesh(geoA, matA);
            sphereA.castShadow = true;
            scene.add(sphereA);

            // Sphere B (Biru)
            const geoB = new THREE.SphereGeometry(0.8, 32, 32);
            const matB = new THREE.MeshStandardMaterial({ color: 0x4444ff, roughness: 0.2, metalness: 0.5, emissive: 0x000033 });
            const sphereB = new THREE.Mesh(geoB, matB);
            sphereB.castShadow = true;
            scene.add(sphereB);

            // Connector Line (Garis Penghubung)
            const lineMat = new THREE.LineBasicMaterial({ color: 0xffff00, linewidth: 2 });
            const lineGeo = new THREE.BufferGeometry().setFromPoints([sphereA.position, sphereB.position]);
            const connectorLine = new THREE.Line(lineGeo, lineMat);
            scene.add(connectorLine);

            // Shadow Line (Proyeksi di Lantai - Opsional biar lebih 3D)
            const shadowLineMat = new THREE.LineBasicMaterial({ color: 0x333333, linewidth: 1, transparent: true, opacity: 0.5 });
            const shadowLineGeo = new THREE.BufferGeometry().setFromPoints([sphereA.position, sphereB.position]);
            const shadowLine = new THREE.Line(shadowLineGeo, shadowLineMat);
            scene.add(shadowLine);

            // Helper: Text Label Sprite
            function createTextSprite(message) {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = 128; canvas.height = 64;
                ctx.font = 'Bold 40px Arial';
                ctx.fillStyle = "white";
                ctx.textAlign = 'center';
                ctx.fillText(message, 64, 40);
                const texture = new THREE.CanvasTexture(canvas);
                const sprite = new THREE.Sprite(new THREE.SpriteMaterial({ map: texture }));
                sprite.scale.set(4, 2, 1);
                return sprite;
            }

            const labelA = createTextSprite("A");
            const labelB = createTextSprite("B");
            scene.add(labelA);
            scene.add(labelB);


            // --- 4. UPDATE LOGIC ---
            function updateSimulation() {
                // 1. Ambil nilai dari Slider
                const ax = parseFloat(document.getElementById('ax').value);
                const ay = parseFloat(document.getElementById('ay').value);
                const az = parseFloat(document.getElementById('az').value);
                
                const bx = parseFloat(document.getElementById('bx').value);
                const by = parseFloat(document.getElementById('by').value);
                const bz = parseFloat(document.getElementById('bz').value);

                // 2. Update Posisi 3D
                sphereA.position.set(ax, ay, az);
                sphereB.position.set(bx, by, bz);

                // Update Posisi Label (Sedikit di atas bola)
                labelA.position.set(ax, ay + 1.5, az);
                labelB.position.set(bx, by + 1.5, bz);

                // 3. Update Garis Penghubung
                connectorLine.geometry.setFromPoints([sphereA.position, sphereB.position]);
                
                // Update Garis Bayangan (Proyeksi di Y=0)
                shadowLine.geometry.setFromPoints([
                    new THREE.Vector3(ax, 0, az),
                    new THREE.Vector3(bx, 0, bz)
                ]);

                // 4. Update UI Text Angka
                document.getElementById('val_ax').innerText = ax;
                document.getElementById('val_ay').innerText = ay;
                document.getElementById('val_az').innerText = az;
                document.getElementById('val_bx').innerText = bx;
                document.getElementById('val_by').innerText = by;
                document.getElementById('val_bz').innerText = bz;

                // Update Angka di Rumus
                document.getElementById('f_x1').innerText = ax;
                document.getElementById('f_y1').innerText = ay;
                document.getElementById('f_z1').innerText = az;
                document.getElementById('f_x2').innerText = bx;
                document.getElementById('f_y2').innerText = by;
                document.getElementById('f_z2').innerText = bz;

                // 5. Hitung Jarak (Euclidean)
                const dx = bx - ax;
                const dy = by - ay;
                const dz = bz - az;
                const distance = Math.sqrt(dx*dx + dy*dy + dz*dz);

                // Tampilkan Hasil
                document.getElementById('resultDistance').innerText = distance.toFixed(2);
            }

            // Event Listeners (Pasang di semua slider)
            const sliders = document.querySelectorAll('input[type=range]');
            sliders.forEach(s => s.addEventListener('input', updateSimulation));

            // Init pertama kali
            updateSimulation();

            // --- 5. ANIMATION LOOP ---
            function animate() {
                requestAnimationFrame(animate);
                
                // Rotasi kamera lambat
                const time = Date.now() * 0.0002;
                camera.position.x = Math.sin(time) * 30;
                camera.position.z = Math.cos(time) * 30;
                camera.lookAt(0, 5, 0);

                renderer.render(scene, camera);
            }
            animate();

            // Resize
            window.addEventListener('resize', () => {
                if(container) {
                    renderer.setSize(container.clientWidth, container.clientHeight);
                    camera.aspect = container.clientWidth / container.clientHeight;
                    camera.updateProjectionMatrix();
                }
            });
        }
    });
</script>