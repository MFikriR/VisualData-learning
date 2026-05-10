{{-- 
    FILE: resources/views/learning/simulations/clustering_kmeans.blade.php
    DESC: Simulasi 3D Algoritma K-Means (Centroid, Assignment, Update)
--}}

{{-- A. PANEL KONTROL --}}
<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 relative z-10 gap-4">
        <div>
            <h4 class="text-white font-bold text-lg flex items-center gap-2">
                <span>🤖</span> Algoritma K-Means
            </h4>
            <p class="text-xs text-gray-400 mt-1">Langkah Iteratif Clustering</p>
        </div>

        <div class="flex flex-wrap gap-2">
            <button id="btn-init" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg font-bold text-xs transition-all shadow-lg shadow-indigo-500/20">
                1. Buat Centroid (K=3)
            </button>
            <button id="btn-assign" disabled class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg font-bold text-xs transition-all disabled:opacity-30 disabled:cursor-not-allowed shadow-lg shadow-blue-500/20">
                2. Hitung Jarak & Kelompokkan
            </button>
            <button id="btn-update" disabled class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-lg font-bold text-xs transition-all disabled:opacity-30 disabled:cursor-not-allowed shadow-lg shadow-green-500/20">
                3. Update Posisi Centroid
            </button>
            <button id="btn-reset" disabled class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg font-bold text-xs transition-all disabled:opacity-30 disabled:cursor-not-allowed">
                Reset
            </button>
        </div>
    </div>

    <div class="bg-gray-800 p-3 rounded-lg border border-gray-700 text-center relative z-10">
        <span class="text-[10px] text-gray-500 uppercase tracking-widest">Status Algoritma</span>
        <div id="algoStatus" class="text-sm font-bold text-white mt-1">Menunggu Inisialisasi...</div>
    </div>
</div>

{{-- B. LOGIKA THREE.JS --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('three-canvas-container');
    
    // Pastikan container ada & slug sesuai
    if (container && typeof THREE !== 'undefined' && container.dataset.simType === 'simulasi-3d-kmeans') {
        
        // Hide Loading
        const loadingText = document.getElementById('loading-indicator');
        if(loadingText) loadingText.style.display = 'none';

        // --- 1. SETUP SCENE ---
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x0a0a0a);
        scene.fog = new THREE.FogExp2(0x0a0a0a, 0.02);
        
        const camera = new THREE.PerspectiveCamera(60, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.set(0, 30, 40);
        camera.lookAt(0, 0, 0);

        const renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.shadowMap.enabled = true;
        container.appendChild(renderer.domElement);

        // --- 2. LIGHTING ---
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);
        const dirLight = new THREE.DirectionalLight(0xffffff, 0.8);
        dirLight.position.set(10, 50, 20);
        dirLight.castShadow = true;
        scene.add(dirLight);

        // --- 3. ENVIRONMENT ---
        const gridHelper = new THREE.GridHelper(60, 60, 0x333333, 0x111111);
        scene.add(gridHelper);

        // --- 4. DATA POINTS ---
        let points = [];
        const numPoints = 150;
        const geometry = new THREE.SphereGeometry(0.6, 16, 16);
        const material = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.5, metalness: 0.1 });

        // Generate Random Data Points (3 Cluster Alami agar terlihat jelas)
        for(let i=0; i<numPoints; i++) {
            const sphere = new THREE.Mesh(geometry, material.clone());
            
            // Buat 3 pusat sebaran alami (Cluster A, B, C)
            const clusterCenter = Math.random();
            let cx, cz;
            
            if(clusterCenter < 0.33) { cx = -15; cz = -15; }      // Kiri Atas
            else if(clusterCenter < 0.66) { cx = 15; cz = -15; }  // Kanan Atas
            else { cx = 0; cz = 15; }                             // Bawah Tengah

            // Sebar acak di sekitar pusat cluster
            sphere.position.set(
                cx + (Math.random() - 0.5) * 15,
                (Math.random() * 5), // Y sedikit variasi
                cz + (Math.random() - 0.5) * 15
            );
            
            sphere.castShadow = true;
            sphere.receiveShadow = true;
            scene.add(sphere);
            points.push({ mesh: sphere, cluster: null });
        }

        // --- 5. K-MEANS LOGIC ---
        let centroids = [];
        const k = 3;
        const centroidColors = [0xff0055, 0x00ff55, 0x0055ff]; // Merah Neon, Hijau Neon, Biru Neon
        let iteration = 0;

        // A. Init Centroid
        document.getElementById('btn-init').addEventListener('click', () => {
            // Reset jika ada
            centroids.forEach(c => scene.remove(c.mesh));
            centroids = [];
            iteration = 0;

            for(let i=0; i<k; i++) {
                // Bentuk Diamond untuk Centroid
                const geo = new THREE.OctahedronGeometry(2, 0);
                const mat = new THREE.MeshStandardMaterial({ 
                    color: centroidColors[i], 
                    emissive: centroidColors[i], 
                    emissiveIntensity: 0.5 
                });
                const mesh = new THREE.Mesh(geo, mat);
                
                // Posisi Acak Awal
                mesh.position.set(
                    (Math.random() - 0.5) * 40,
                    10, // Melayang di atas
                    (Math.random() - 0.5) * 40
                );
                
                // Tambah label angka (Opsional, pakai point light aja biar simpel)
                const light = new THREE.PointLight(centroidColors[i], 1, 20);
                light.position.y = 2;
                mesh.add(light);

                scene.add(mesh);
                centroids.push({ mesh: mesh, color: centroidColors[i] });
            }

            updateStatus("Centroid dibuat secara acak. Klik 'Hitung Jarak' untuk mulai.");
            toggleButtons(false, true, false, true);
        });

        // B. Assign Data (E-Step)
        document.getElementById('btn-assign').addEventListener('click', () => {
            let changes = 0;
            points.forEach(p => {
                let minDist = Infinity;
                let closestIndex = -1;

                centroids.forEach((c, index) => {
                    // Hanya hitung jarak X dan Z (2D Plane projection) agar lebih mudah dipahami
                    const dist = Math.sqrt(
                        Math.pow(p.mesh.position.x - c.mesh.position.x, 2) +
                        Math.pow(p.mesh.position.z - c.mesh.position.z, 2)
                    );
                    
                    if(dist < minDist) {
                        minDist = dist;
                        closestIndex = index;
                    }
                });

                if(p.cluster !== closestIndex) {
                    changes++;
                    p.cluster = closestIndex;
                    // Animasi perubahan warna
                    p.mesh.material.color.setHex(centroidColors[closestIndex]);
                    p.mesh.material.emissive.setHex(centroidColors[closestIndex]);
                    p.mesh.material.emissiveIntensity = 0.2;
                }
            });

            updateStatus(`Iterasi ${iteration+1}: ${changes} titik berpindah kelompok.`);
            toggleButtons(false, false, true, true);
        });

        // C. Update Centroid (M-Step)
        document.getElementById('btn-update').addEventListener('click', () => {
            let sums = Array(k).fill(0).map(() => ({ x:0, z:0, count:0 }));

            points.forEach(p => {
                if(p.cluster !== null) {
                    sums[p.cluster].x += p.mesh.position.x;
                    sums[p.cluster].z += p.mesh.position.z;
                    sums[p.cluster].count++;
                }
            });

            centroids.forEach((c, i) => {
                if(sums[i].count > 0) {
                    const newX = sums[i].x / sums[i].count;
                    const newZ = sums[i].z / sums[i].count;
                    
                    // Animasi Geser (Lerp Manual simple)
                    c.mesh.position.x = newX;
                    c.mesh.position.z = newZ;
                }
            });

            iteration++;
            updateStatus(`Centroid bergeser ke rata-rata baru. Ulangi langkah 'Hitung Jarak'.`);
            toggleButtons(false, true, false, true);
        });

        // D. Reset
        document.getElementById('btn-reset').addEventListener('click', () => {
            points.forEach(p => {
                p.cluster = null;
                p.mesh.material.color.setHex(0xffffff);
                p.mesh.material.emissive.setHex(0x000000);
            });
            centroids.forEach(c => scene.remove(c.mesh));
            centroids = [];
            
            updateStatus("Siap. Klik 'Buat Centroid' untuk mulai.");
            toggleButtons(true, false, false, false);
        });

        function toggleButtons(init, assign, update, reset) {
            document.getElementById('btn-init').disabled = !init;
            document.getElementById('btn-assign').disabled = !assign;
            document.getElementById('btn-update').disabled = !update;
            document.getElementById('btn-reset').disabled = !reset;
        }

        function updateStatus(msg) {
            document.getElementById('algoStatus').innerText = msg;
        }

        // --- 6. ANIMATION LOOP ---
        function animate() {
            requestAnimationFrame(animate);
            scene.rotation.y += 0.001; // Putar pelan
            
            // Centroid bobbing (naik turun)
            centroids.forEach((c, i) => {
                c.mesh.position.y = 10 + Math.sin(Date.now() * 0.003 + i) * 2;
                c.mesh.rotation.y += 0.02;
            });

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