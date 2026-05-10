{{-- 
    FILE: resources/views/learning/simulations/scatter_correlation.blade.php
    DESC: Simulasi Scatter Plot (X vs Y) untuk melihat Korelasi
--}}

{{-- A. PANEL KONTROL --}}
<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 relative z-10 gap-4">
        <div>
            <h4 class="text-white font-bold text-lg flex items-center gap-2">
                <span>📈</span> Pola Hubungan (Korelasi)
            </h4>
            <p class="text-xs text-gray-400 mt-1">Uji hubungan Variabel X dan Y</p>
        </div>

        {{-- Tombol Generator --}}
        <div class="flex flex-wrap gap-2">
            <button onclick="generateScatter('positive')" class="px-4 py-2 rounded-lg bg-green-500/10 text-green-400 border border-green-500/50 hover:bg-green-500 hover:text-white transition-all text-xs font-bold flex items-center gap-2">
                ↗️ Positif
            </button>
            <button onclick="generateScatter('negative')" class="px-4 py-2 rounded-lg bg-red-500/10 text-red-400 border border-red-500/50 hover:bg-red-500 hover:text-white transition-all text-xs font-bold flex items-center gap-2">
                ↘️ Negatif
            </button>
            <button onclick="generateScatter('none')" class="px-4 py-2 rounded-lg bg-gray-500/10 text-gray-400 border border-gray-500/50 hover:bg-gray-500 hover:text-white transition-all text-xs font-bold flex items-center gap-2">
                Failed Acak
            </button>
        </div>
    </div>

    {{-- Info Korelasi --}}
    <div class="bg-gray-800 p-3 rounded-lg border border-gray-700 text-center relative z-10">
        <span class="text-[10px] text-gray-500 uppercase tracking-widest">Interpretasi Saat Ini</span>
        <div id="correlationText" class="text-lg font-bold text-white mt-1">Pilih Pola di Atas</div>
    </div>
</div>

{{-- B. LOGIKA THREE.JS --}}
<script>
    // Global function access
    let generateScatter;

    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById('three-canvas-container');
        
        if (container && typeof THREE !== 'undefined' && container.dataset.simType === 'simulasi-3d-scatterplot-correlation') {
            
            // Hide Loading
            const loadingText = document.getElementById('loading-indicator');
            if(loadingText) loadingText.style.display = 'none';

            // --- 1. SETUP SCENE ---
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x0a0a0a);
            
            const camera = new THREE.PerspectiveCamera(50, container.clientWidth / container.clientHeight, 0.1, 1000);
            // Posisi kamera tegak lurus (Front View) tapi agak serong dikit biar kelihatan 3D
            camera.position.set(0, 0, 35); 
            camera.lookAt(0, 0, 0);

            const renderer = new THREE.WebGLRenderer({ antialias: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            container.appendChild(renderer.domElement);

            // --- 2. SUMBU KOORDINAT (X & Y) ---
            function createAxis() {
                const group = new THREE.Group();

                // Garis X (Horizontal)
                const materialX = new THREE.LineBasicMaterial({ color: 0x4b5563 });
                const pointsX = [new THREE.Vector3(-15, -10, 0), new THREE.Vector3(15, -10, 0)];
                const geometryX = new THREE.BufferGeometry().setFromPoints(pointsX);
                const lineX = new THREE.Line(geometryX, materialX);
                group.add(lineX);

                // Garis Y (Vertikal)
                const materialY = new THREE.LineBasicMaterial({ color: 0x4b5563 });
                const pointsY = [new THREE.Vector3(-15, -10, 0), new THREE.Vector3(-15, 10, 0)];
                const geometryY = new THREE.BufferGeometry().setFromPoints(pointsY);
                const lineY = new THREE.Line(geometryY, materialY);
                group.add(lineY);

                // Grid Belakang (Graph Paper Effect)
                const grid = new THREE.GridHelper(30, 30, 0x1f2937, 0x111827);
                grid.rotation.x = Math.PI / 2; // Berdiri tegak
                grid.position.z = -0.5; // Mundur dikit
                grid.position.y = 0; // Tengah
                group.add(grid);

                return group;
            }
            scene.add(createAxis());

            // --- 3. DATA POINTS ---
            let pointsGroup = new THREE.Group();
            scene.add(pointsGroup);
            let trendLine = null;

            // Fungsi Generator Data
            generateScatter = function(type) {
                // Bersihkan scene lama
                pointsGroup.clear();
                if(trendLine) { scene.remove(trendLine); trendLine = null; }

                const numPoints = 100;
                const geometry = new THREE.SphereGeometry(0.3, 16, 16);
                let color = 0xffffff;
                let text = "";

                if (type === 'positive') {
                    color = 0x4ade80; // Hijau
                    text = "Korelasi Positif Kuat (Naik)";
                } else if (type === 'negative') {
                    color = 0xf87171; // Merah
                    text = "Korelasi Negatif Kuat (Turun)";
                } else {
                    color = 0x94a3b8; // Abu
                    text = "Tidak Ada Korelasi (Acak)";
                }

                document.getElementById('correlationText').innerText = text;
                document.getElementById('correlationText').style.color = '#' + color.toString(16);

                const material = new THREE.MeshBasicMaterial({ color: color });

                // Loop Data
                for(let i=0; i<numPoints; i++) {
                    const sphere = new THREE.Mesh(geometry, material);
                    
                    // Logika Matematika Scatter
                    // X range: -12 sampai 12
                    // Y range: -8 sampai 8
                    
                    let x = (Math.random() * 24) - 12; 
                    let y = 0;
                    let noise = (Math.random() * 6) - 3; // Variasi acak (Error)

                    if (type === 'positive') {
                        // Rumus Garis Lurus: y = x (dengan noise)
                        y = (x * 0.6) + noise; 
                    } else if (type === 'negative') {
                        // Rumus: y = -x
                        y = (-x * 0.6) + noise;
                    } else {
                        // Random total
                        y = (Math.random() * 16) - 8;
                    }

                    sphere.position.set(x, y, 0);
                    
                    // Efek animasi muncul (Scale 0 -> 1 nanti di loop)
                    sphere.scale.set(0,0,0);
                    sphere.targetScale = 1;
                    
                    pointsGroup.add(sphere);
                }

                // Tambah Trendline (Garis Regresi) jika bukan acak
                if (type !== 'none') {
                    const lineMat = new THREE.LineBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0.5 });
                    const linePoints = [];
                    if (type === 'positive') {
                        linePoints.push(new THREE.Vector3(-12, -7.2, 0.5));
                        linePoints.push(new THREE.Vector3(12, 7.2, 0.5));
                    } else {
                        linePoints.push(new THREE.Vector3(-12, 7.2, 0.5));
                        linePoints.push(new THREE.Vector3(12, -7.2, 0.5));
                    }
                    const lineGeo = new THREE.BufferGeometry().setFromPoints(linePoints);
                    trendLine = new THREE.Line(lineGeo, lineMat);
                    scene.add(trendLine);
                }
            }

            // Init Pertama
            generateScatter('positive');

            // --- 4. ANIMATION LOOP ---
            function animate() {
                requestAnimationFrame(animate);

                // Animasi Titik Muncul (Pop up)
                pointsGroup.children.forEach(p => {
                    if (p.scale.x < p.targetScale) {
                        p.scale.addScalar(0.1);
                    }
                });

                // Sedikit goyangan kamera biar kerasa 3D-nya (Parallax Effect)
                camera.position.x = Math.sin(Date.now() * 0.0005) * 2;
                camera.position.y = Math.cos(Date.now() * 0.0005) * 2;
                camera.lookAt(0, 0, 0);

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