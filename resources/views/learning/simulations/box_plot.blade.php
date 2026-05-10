{{-- 
    FILE: resources/views/learning/simulations/box_plot.blade.php
    DESC: Simulasi 3D Box Plot dengan Visualisasi Outlier & IQR
--}}

{{-- A. PANEL KONTROL --}}
<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-purple-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 relative z-10 gap-4">
        <div>
            <h4 class="text-white font-bold text-lg flex items-center gap-2">
                <span>📦</span> Anatomi Data
            </h4>
            <p class="text-xs text-gray-400 mt-1">Visualisasi 5-Serangkai & Pencilan</p>
        </div>

        {{-- Tombol Skenario Data --}}
        <div class="flex flex-wrap gap-2">
            <button onclick="changeScenario('normal')" class="px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-xs text-gray-300 hover:bg-purple-600 hover:text-white hover:border-purple-500 transition-all">
                🔔 Normal
            </button>
            <button onclick="changeScenario('skewed')" class="px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-xs text-gray-300 hover:bg-purple-600 hover:text-white hover:border-purple-500 transition-all">
                📉 Miring (Skewed)
            </button>
            <button onclick="changeScenario('outliers')" class="px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-xs text-gray-300 hover:bg-red-600 hover:text-white hover:border-red-500 transition-all">
                🚨 Banyak Outlier
            </button>
        </div>
    </div>

    {{-- Statistik Realtime --}}
    <div class="grid grid-cols-5 gap-2 border-t border-gray-800 pt-4 text-center relative z-10">
        <div><span class="text-[10px] text-gray-500 block">MIN</span><span id="txtMin" class="text-sm font-bold text-white">-</span></div>
        <div><span class="text-[10px] text-gray-500 block">Q1</span><span id="txtQ1" class="text-sm font-bold text-purple-400">-</span></div>
        <div class="bg-gray-800 rounded"><span class="text-[10px] text-gray-500 block">MEDIAN</span><span id="txtMed" class="text-sm font-bold text-green-400">-</span></div>
        <div><span class="text-[10px] text-gray-500 block">Q3</span><span id="txtQ3" class="text-sm font-bold text-purple-400">-</span></div>
        <div><span class="text-[10px] text-gray-500 block">MAX</span><span id="txtMax" class="text-sm font-bold text-white">-</span></div>
    </div>
</div>

{{-- B. LOGIKA THREE.JS --}}
<script>
    // Variabel Global agar bisa diakses tombol HTML
    let changeScenario;

    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById('three-canvas-container');
        
        if (container && typeof THREE !== 'undefined' && container.dataset.simType === 'simulasi-3d-boxplot') {
            
            // Hide Loading
            const loadingText = document.getElementById('loading-indicator');
            if(loadingText) loadingText.style.display = 'none';

            // --- 1. SETUP SCENE ---
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x050505);
            
            const camera = new THREE.PerspectiveCamera(50, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.set(20, 15, 20); // Sudut pandang isometrik
            camera.lookAt(0, 5, 0);

            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.shadowMap.enabled = true;
            container.appendChild(renderer.domElement);

            // --- 2. LIGHTING ---
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);
            const dirLight = new THREE.DirectionalLight(0xffffff, 0.8);
            dirLight.position.set(10, 20, 10);
            dirLight.castShadow = true;
            scene.add(dirLight);

            // --- 3. ENV ---
            const gridHelper = new THREE.GridHelper(30, 30, 0x333333, 0x111111);
            scene.add(gridHelper);

            // --- 4. OBJECTS GROUP ---
            const mainGroup = new THREE.Group();
            scene.add(mainGroup);

            // Komponen Box Plot (Mesh)
            let boxMesh, medianLine, whiskerTop, whiskerBottom, capTop, capBottom;
            let dataPoints = []; // Bola-bola data

            // Init Object Kosong
            function initObjects() {
                // A. The Box (IQR) - Transparan
                const boxGeo = new THREE.BoxGeometry(4, 1, 4);
                const boxMat = new THREE.MeshStandardMaterial({ 
                    color: 0xa855f7, // Ungu
                    transparent: true, 
                    opacity: 0.4,
                    roughness: 0.1
                });
                boxMesh = new THREE.Mesh(boxGeo, boxMat);
                mainGroup.add(boxMesh);

                // Outline Box (Biar tegas)
                const edges = new THREE.EdgesGeometry(boxGeo);
                const line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0.3 }));
                boxMesh.add(line);

                // B. Median Line (Hijau)
                const medGeo = new THREE.BoxGeometry(4.2, 0.1, 4.2);
                const medMat = new THREE.MeshBasicMaterial({ color: 0x4ade80 });
                medianLine = new THREE.Mesh(medGeo, medMat);
                mainGroup.add(medianLine);

                // C. Whiskers (Garis Kumis)
                const whiskerMat = new THREE.LineBasicMaterial({ color: 0xffffff });
                
                // Garis vertikal dibuat pakai Cylinder tipis biar lebih visible di 3D
                const whiskerGeo = new THREE.CylinderGeometry(0.05, 0.05, 1);
                const whiskerMeshMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
                
                whiskerTop = new THREE.Mesh(whiskerGeo, whiskerMeshMat);
                whiskerBottom = new THREE.Mesh(whiskerGeo, whiskerMeshMat);
                mainGroup.add(whiskerTop);
                mainGroup.add(whiskerBottom);

                // D. Caps (Topi Kumis)
                const capGeo = new THREE.BoxGeometry(2, 0.05, 0.05);
                capTop = new THREE.Mesh(capGeo, whiskerMeshMat);
                capBottom = new THREE.Mesh(capGeo, whiskerMeshMat);
                mainGroup.add(capTop);
                mainGroup.add(capBottom);
            }
            initObjects();

            // --- 5. MATH LOGIC (KUARTIL) ---
            function calculateStats(data) {
                data.sort((a, b) => a - b);
                const q1 = d3_quantile(data, 0.25);
                const median = d3_quantile(data, 0.50);
                const q3 = d3_quantile(data, 0.75);
                const iqr = q3 - q1;
                const minLimit = q1 - 1.5 * iqr;
                const maxLimit = q3 + 1.5 * iqr;

                // Cari min/max non-outlier
                const nonOutliers = data.filter(x => x >= minLimit && x <= maxLimit);
                const min = Math.min(...nonOutliers);
                const max = Math.max(...nonOutliers);

                return { min, q1, median, q3, max, minLimit, maxLimit };
            }

            // Fungsi helper quantile sederhana (mirip Excel)
            function d3_quantile(sorted, p) {
                const idx = (sorted.length - 1) * p;
                const i = Math.floor(idx);
                const f = idx - i;
                if (i + 1 < sorted.length) {
                    return sorted[i] * (1 - f) + sorted[i + 1] * f;
                } else {
                    return sorted[i];
                }
            }

            // --- 6. UPDATE VISUALIZATION ---
            function updatePlot(data) {
                const stats = calculateStats(data);

                // Update UI Teks
                document.getElementById('txtMin').innerText = stats.min.toFixed(1);
                document.getElementById('txtQ1').innerText = stats.q1.toFixed(1);
                document.getElementById('txtMed').innerText = stats.median.toFixed(1);
                document.getElementById('txtQ3').innerText = stats.q3.toFixed(1);
                document.getElementById('txtMax').innerText = stats.max.toFixed(1);

                // --- ANIMASI TITIK DATA (SCATTER JITTER) ---
                // Hapus titik lama
                dataPoints.forEach(p => mainGroup.remove(p));
                dataPoints = [];

                data.forEach(val => {
                    const isOutlier = val < stats.min || val > stats.max;
                    const color = isOutlier ? 0xef4444 : 0xa5f3fc; // Merah jika outlier, Cyan jika normal
                    const size = isOutlier ? 0.3 : 0.15;

                    const geo = new THREE.SphereGeometry(size, 8, 8);
                    const mat = new THREE.MeshBasicMaterial({ color: color });
                    const sphere = new THREE.Mesh(geo, mat);

                    // Posisi Y sesuai nilai
                    // Posisi X/Z random (Jitter) agar tidak bertumpuk garis lurus
                    sphere.position.set(
                        (Math.random() - 0.5) * 3, 
                        val / 5, // Skala Value ke Y
                        (Math.random() - 0.5) * 3
                    );
                    
                    mainGroup.add(sphere);
                    dataPoints.push(sphere);
                });

                // --- ANIMASI BOX PLOT MESH ---
                // Gunakan Scale Y untuk tinggi box
                // Gunakan Position Y untuk letak box
                
                const scaleY = 1/5; // Faktor skala visual

                // 1. Box (IQR)
                const boxHeight = (stats.q3 - stats.q1) * scaleY;
                const boxCenterY = (stats.q1 + (stats.q3 - stats.q1) / 2) * scaleY;
                
                // Animasi manual (Langsung set scale/posisi agar responsif)
                boxMesh.scale.y = Math.max(0.1, boxHeight); // Minimal ada tinggi
                boxMesh.position.y = boxCenterY;

                // 2. Median Line
                medianLine.position.y = stats.median * scaleY;

                // 3. Whiskers
                // Top Whisker (Q3 ke Max)
                const topLen = (stats.max - stats.q3) * scaleY;
                whiskerTop.scale.y = Math.max(0.01, topLen);
                whiskerTop.position.y = (stats.q3 * scaleY) + (topLen / 2);

                // Bottom Whisker (Q1 ke Min)
                const botLen = (stats.q1 - stats.min) * scaleY;
                whiskerBottom.scale.y = Math.max(0.01, botLen);
                whiskerBottom.position.y = (stats.q1 * scaleY) - (botLen / 2);

                // Caps
                capTop.position.y = stats.max * scaleY;
                capBottom.position.y = stats.min * scaleY;
            }

            // --- 7. DATA GENERATOR ---
            changeScenario = function(type) {
                let newData = [];
                const n = 100;

                for(let i=0; i<n; i++) {
                    let val;
                    if(type === 'normal') {
                        // Gaussian (Bell curve) di tengah (50)
                        val = 50 + (Math.random() + Math.random() + Math.random() + Math.random() - 2) * 15; 
                    } else if(type === 'skewed') {
                        // Miring ke bawah (banyak nilai kecil)
                        val = 20 + Math.pow(Math.random(), 3) * 80; 
                    } else if(type === 'outliers') {
                        // Normal + beberapa outlier ekstrim
                        val = 50 + (Math.random() - 0.5) * 30;
                        if(Math.random() > 0.95) val = Math.random() > 0.5 ? 95 : 5; // Outlier
                    }
                    newData.push(val);
                }
                updatePlot(newData);
            }

            // Init Pertama
            changeScenario('normal');

            // --- 8. ANIMATION LOOP ---
            function animate() {
                requestAnimationFrame(animate);
                
                // Rotasi lambat
                mainGroup.rotation.y += 0.002;

                // Data points "bernafas" sedikit
                dataPoints.forEach((p, i) => {
                    p.position.y += Math.sin(Date.now() * 0.005 + i) * 0.005;
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