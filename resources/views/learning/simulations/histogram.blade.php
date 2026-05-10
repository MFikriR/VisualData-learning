{{-- 
    FILE: resources/views/learning/simulations/histogram.blade.php
    DESC: Simulasi 3D Histogram dengan Gaussian Distribution & Dynamic Binning
--}}

{{-- A. PANEL KONTROL --}}
<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">
    {{-- Background Effect --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-6 relative z-10">
        {{-- Judul --}}
        <div>
            <h4 class="text-white font-bold text-lg flex items-center gap-2">
                <span>📊</span> Analisis Distribusi
            </h4>
            <p class="text-xs text-gray-400 mt-1">Data: 500 Nilai Siswa (Acak)</p>
        </div>

        {{-- Kontrol Utama --}}
        <div class="flex items-center gap-4 w-full md:w-auto">
            {{-- Slider Bin --}}
            <div class="flex-1 md:w-64 bg-gray-800 p-3 rounded-lg border border-gray-700">
                <div class="flex justify-between text-xs mb-2">
                    <label class="text-gray-300 font-bold uppercase tracking-wider">Jumlah Kelas (Bins)</label>
                    <span id="binDisplay" class="text-blue-400 font-mono font-bold">10</span>
                </div>
                <input type="range" id="binSlider" min="2" max="30" value="10" step="1" 
                    class="w-full h-2 bg-gray-600 rounded-lg appearance-none cursor-pointer accent-blue-500 hover:accent-blue-400 transition-all">
            </div>

            {{-- Tombol Generate --}}
            <button id="btnRegenerate" class="p-3 rounded-lg bg-gray-800 border border-gray-600 text-gray-300 hover:text-white hover:bg-gray-700 hover:border-gray-500 transition-all group" title="Acak Ulang Data">
                <svg class="w-6 h-6 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
            </button>
        </div>
    </div>

    {{-- Info Statistik Sederhana --}}
    <div class="grid grid-cols-3 gap-4 border-t border-gray-800 pt-4 relative z-10">
        <div class="text-center">
            <span class="text-[10px] text-gray-500 uppercase">Min</span>
            <div id="statMin" class="text-sm font-bold text-gray-300">0</div>
        </div>
        <div class="text-center border-l border-gray-800">
            <span class="text-[10px] text-gray-500 uppercase">Rata-rata</span>
            <div id="statAvg" class="text-sm font-bold text-white">0</div>
        </div>
        <div class="text-center border-l border-gray-800">
            <span class="text-[10px] text-gray-500 uppercase">Max</span>
            <div id="statMax" class="text-sm font-bold text-gray-300">0</div>
        </div>
    </div>
</div>

{{-- B. LOGIKA THREE.JS --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('three-canvas-container');
    
    if (container && typeof THREE !== 'undefined' && container.dataset.simType === 'simulasi-3d-histogram') {
        
        // Hide Loading
        const loadingText = document.getElementById('loading-indicator');
        if(loadingText) loadingText.style.display = 'none';

        // --- 1. SETUP SCENE ---
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x0a0a0a);
        
        // Camera (Orthographic lebih bagus untuk histogram teknis, tapi Perspective lebih "Wah")
        const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.set(0, 15, 30);
        camera.lookAt(0, 5, 0);

        const renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.shadowMap.enabled = true;
        container.appendChild(renderer.domElement);

        // --- 2. LIGHTING ---
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);

        const dirLight = new THREE.DirectionalLight(0xffffff, 0.8);
        dirLight.position.set(10, 20, 10);
        dirLight.castShadow = true;
        scene.add(dirLight);

        // --- 3. ENV ---
        const gridHelper = new THREE.GridHelper(40, 40, 0x333333, 0x111111);
        scene.add(gridHelper);

        // --- 4. DATA LOGIC ---
        let rawData = [];
        let bars = []; // Menyimpan mesh batang 3D

        // Fungsi Acak Data (Gaussian / Bell Curve sederhana)
        function generateData() {
            rawData = [];
            for (let i = 0; i < 500; i++) {
                // Box-Muller transform untuk distribusi normal
                let u = 0, v = 0;
                while(u === 0) u = Math.random();
                while(v === 0) v = Math.random();
                let num = Math.sqrt( -2.0 * Math.log( u ) ) * Math.cos( 2.0 * Math.PI * v );
                
                // Normalisasi ke range 0-100 (Nilai Ujian)
                num = num * 15 + 50; // Mean 50, SD 15
                if (num < 0) num = 0;
                if (num > 100) num = 100;
                rawData.push(num);
            }
            updateStats();
            createHistogram();
        }

        function updateStats() {
            const min = Math.min(...rawData).toFixed(1);
            const max = Math.max(...rawData).toFixed(1);
            const sum = rawData.reduce((a, b) => a + b, 0);
            const avg = (sum / rawData.length).toFixed(1);

            document.getElementById('statMin').innerText = min;
            document.getElementById('statMax').innerText = max;
            document.getElementById('statAvg').innerText = avg;
        }

        // --- 5. HISTOGRAM LOGIC ---
        function createHistogram() {
            // Hapus batang lama
            bars.forEach(b => scene.remove(b));
            bars = [];

            // 1. Hitung Binning
            const binCount = parseInt(document.getElementById('binSlider').value);
            document.getElementById('binDisplay').innerText = binCount;

            const minVal = 0;
            const maxVal = 100;
            const range = maxVal - minVal;
            const binWidth = range / binCount;
            
            let bins = new Array(binCount).fill(0);

            // Masukkan data ke tong (bins)
            rawData.forEach(val => {
                let binIndex = Math.floor((val - minVal) / binWidth);
                if (binIndex >= binCount) binIndex = binCount - 1; // Handle edge case 100
                bins[binIndex]++;
            });

            // 2. Visualisasi 3D
            const maxFreq = Math.max(...bins);
            const totalWidth3D = 30; // Lebar total grafik di dunia 3D
            const barWidth3D = totalWidth3D / binCount; 
            const startX = -totalWidth3D / 2 + (barWidth3D / 2);

            bins.forEach((freq, i) => {
                // Tinggi batang (Scale agar tidak terlalu tinggi)
                const height = (freq / maxFreq) * 12; 
                
                if (height > 0.1) { // Hanya gambar jika ada isinya
                    const geometry = new THREE.BoxGeometry(barWidth3D * 0.95, height, 4); // 0.95 biar ada gap tipis visual (opsional)
                    // Atau pakai barWidth3D * 1.0 jika ingin benar-benar nempel (Strict Histogram)
                    
                    geometry.translate(0, height / 2, 0); // Pivot bawah

                    // Warna Gradasi berdasarkan tinggi (Heatmap style)
                    // Pendek = Biru, Tinggi = Merah
                    const color = new THREE.Color().setHSL(0.7 - (freq/maxFreq * 0.7), 1, 0.5); 

                    const material = new THREE.MeshStandardMaterial({ 
                        color: color, 
                        roughness: 0.3,
                        metalness: 0.2
                    });
                    
                    const bar = new THREE.Mesh(geometry, material);
                    
                    // Posisi X
                    bar.position.x = startX + (i * barWidth3D);
                    bar.position.z = 0;
                    
                    // Animasi Pop-up (Scale 0 -> 1)
                    bar.scale.y = 0.01;
                    bar.targetScale = 1;

                    bar.castShadow = true;
                    bar.receiveShadow = true;

                    scene.add(bar);
                    bars.push(bar);
                }
            });
        }

        // --- 6. EVENTS ---
        document.getElementById('binSlider').addEventListener('input', createHistogram);
        document.getElementById('btnRegenerate').addEventListener('click', generateData);

        // Init Data
        generateData();

        // --- 7. ANIMATION LOOP ---
        function animate() {
            requestAnimationFrame(animate);

            // Smooth Growth Animation for Bars
            bars.forEach(bar => {
                if (bar.scale.y < bar.targetScale) {
                    bar.scale.y += (bar.targetScale - bar.scale.y) * 0.15;
                }
            });

            // Putar scene pelan
            scene.rotation.y = Math.sin(Date.now() * 0.0002) * 0.05;

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