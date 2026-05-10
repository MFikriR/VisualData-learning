{{-- 
    FILE: resources/views/learning/simulations/clustering_concept.blade.php
    DESC: Simulasi Konsep Dasar Clustering (Chaos to Order)
--}}

{{-- A. PANEL KONTROL --}}
<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">
    {{-- Efek Glow --}}
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-pink-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-4 relative z-10 gap-4">
        <div>
            <h4 class="text-white font-bold text-lg flex items-center gap-2">
                <span>🔮</span> The Magic of Clustering
            </h4>
            <p class="text-xs text-gray-400 mt-1">Unsupervised Learning Visualization</p>
        </div>

        <div class="flex gap-3">
            <button onclick="setMode('chaos')" class="px-5 py-2.5 rounded-full bg-gray-800 border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition-all font-bold text-sm flex items-center gap-2">
                <span>🌪️</span> Acak (Chaos)
            </button>
            <button onclick="setMode('order')" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white hover:from-indigo-500 hover:to-purple-500 transition-all font-bold text-sm shadow-lg shadow-purple-500/30 flex items-center gap-2">
                <span>✨</span> Kelompokkan (Clustering)
            </button>
        </div>
    </div>
</div>

{{-- B. LOGIKA THREE.JS --}}
<script>
    let setMode; // Global function

    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById('three-canvas-container');
        
        if (container && typeof THREE !== 'undefined' && container.dataset.simType === 'simulasi-3d-konsep-clustering') {
            
            const loadingText = document.getElementById('loading-indicator');
            if(loadingText) loadingText.style.display = 'none';

            // --- 1. SETUP SCENE ---
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x050505);
            scene.fog = new THREE.FogExp2(0x050505, 0.02);

            const camera = new THREE.PerspectiveCamera(55, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.set(0, 0, 40);

            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            // --- 2. OBJECTS (PARTICLES) ---
            const particleCount = 300; // Jumlah titik
            const particles = [];
            const group = new THREE.Group();
            scene.add(group);

            // Warna Cluster: Merah, Biru, Kuning, Hijau
            const colors = [0xff4444, 0x4444ff, 0xffaa00, 0x00cc66];
            const clusterCenters = [
                new THREE.Vector3(-15, 10, 0),  // Kiri Atas (Merah)
                new THREE.Vector3(15, -10, 0),  // Kanan Bawah (Biru)
                new THREE.Vector3(15, 10, 0),   // Kanan Atas (Kuning)
                new THREE.Vector3(-15, -10, 0)  // Kiri Bawah (Hijau)
            ];

            const geometry = new THREE.SphereGeometry(0.4, 8, 8); // Low poly spheres biar ringan

            for (let i = 0; i < particleCount; i++) {
                // Tentukan Cluster ID secara acak (0-3)
                const clusterId = Math.floor(Math.random() * 4);
                const color = colors[clusterId];

                const material = new THREE.MeshBasicMaterial({ color: color });
                const mesh = new THREE.Mesh(geometry, material);

                // Posisi Awal: ACAK (Chaos) di tengah
                const x = (Math.random() - 0.5) * 30;
                const y = (Math.random() - 0.5) * 20;
                const z = (Math.random() - 0.5) * 10;
                
                mesh.position.set(x, y, z);
                
                // Simpan data partikel
                particles.push({
                    mesh: mesh,
                    clusterId: clusterId,
                    targetPos: new THREE.Vector3(x, y, z), // Target awal = posisi awal
                    velocity: new THREE.Vector3(0,0,0),
                    wobbleSpeed: Math.random() * 0.02 + 0.01,
                    wobbleOffset: Math.random() * 100
                });

                group.add(mesh);
            }

            // --- 3. INTERACTION LOGIC ---
            setMode = function(mode) {
                particles.forEach(p => {
                    if (mode === 'chaos') {
                        // Sebar acak lagi
                        p.targetPos.set(
                            (Math.random() - 0.5) * 40,
                            (Math.random() - 0.5) * 30,
                            (Math.random() - 0.5) * 20
                        );
                    } else if (mode === 'order') {
                        // Terbang ke pusat cluster masing-masing
                        const center = clusterCenters[p.clusterId];
                        
                        // Tambah variasi (noise) agar tidak menumpuk di satu titik persis
                        const noiseX = (Math.random() - 0.5) * 8; 
                        const noiseY = (Math.random() - 0.5) * 8;
                        const noiseZ = (Math.random() - 0.5) * 8;
                        
                        p.targetPos.set(
                            center.x + noiseX,
                            center.y + noiseY,
                            center.z + noiseZ
                        );
                    }
                });
            };

            // --- 4. ANIMATION LOOP ---
            function animate() {
                requestAnimationFrame(animate);

                const time = Date.now() * 0.001;

                particles.forEach(p => {
                    // A. GERAKAN UTAMA (Lerp ke Target)
                    // Semakin kecil angkanya (0.03), semakin lambat & smooth gerakannya
                    p.mesh.position.lerp(p.targetPos, 0.04);

                    // B. GERAKAN SEKUNDER (Wobble/Melayang)
                    // Agar terlihat hidup seperti kunang-kunang/atom
                    p.mesh.position.x += Math.sin(time * p.wobbleSpeed + p.wobbleOffset) * 0.02;
                    p.mesh.position.y += Math.cos(time * p.wobbleSpeed + p.wobbleOffset) * 0.02;
                });

                // Rotasi Scene Pelan
                group.rotation.y = Math.sin(time * 0.1) * 0.1;
                group.rotation.x = Math.cos(time * 0.1) * 0.05;

                renderer.render(scene, camera);
            }
            animate();

            // Handle Resize
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