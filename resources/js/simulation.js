import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

// --- VARIABEL GLOBAL SIMULASI ---
let scene, camera, renderer, controls;
let points = [];     // Menyimpan bola-bola data
let centroids = [];  // Menyimpan 3 bola besar (Centroid)
let stage = 0;       // 0: Awal, 1: Centroid Dibuat, 2: Grouping, 3: Update Posisi

// Warna K-Means (Merah, Hijau, Biru)
const COLORS = [0xff4d4d, 0x4ade80, 0x3b82f6]; 
const NEUTRAL_COLOR = 0xffffff;

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('three-canvas-container');
    if (container) {
        initThreeJS(container);
        setupButtons();
    }
});

function initThreeJS(container) {
    // 1. SETUP DASAR
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0x0d0e10);
    scene.fog = new THREE.FogExp2(0x0d0e10, 0.02);

    camera = new THREE.PerspectiveCamera(60, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(30, 30, 50);

    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;

    // 2. PENCAHAYAAN
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);
    const pointLight = new THREE.PointLight(0xffffff, 1);
    pointLight.position.set(20, 20, 20);
    scene.add(pointLight);

    // 3. GRID & AXES
    const gridHelper = new THREE.GridHelper(50, 20, 0x333333, 0x111111);
    scene.add(gridHelper);

    // 4. GENERATE DATA ACAK
    generateRandomData(150); // Buat 150 titik

    // 5. ANIMASI LOOP
    function animate() {
        requestAnimationFrame(animate);
        controls.update();
        
        // Animasi Centroid (sedikit memantul agar hidup)
        centroids.forEach((c, index) => {
            c.mesh.position.y = 2 + Math.sin(Date.now() * 0.003 + index) * 0.5;
        });

        renderer.render(scene, camera);
    }
    animate();

    // 6. RESPONSIVE
    window.addEventListener('resize', () => {
        if(container) {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        }
    });
}

// --- FUNGSI LOGIKA K-MEANS ---

function generateRandomData(count) {
    // Hapus data lama jika ada
    points.forEach(p => scene.remove(p.mesh));
    points = [];

    const geometry = new THREE.SphereGeometry(0.5, 16, 16);
    const material = new THREE.MeshStandardMaterial({ color: NEUTRAL_COLOR, metalness: 0.5, roughness: 0.5 });

    for (let i = 0; i < count; i++) {
        const mesh = new THREE.Mesh(geometry, material.clone());
        
        // Sebar acak di area X(-20 s/d 20) dan Z(-20 s/d 20)
        mesh.position.set(
            (Math.random() - 0.5) * 40,
            Math.random() * 5 + 0.5, // Sedikit melayang dari lantai
            (Math.random() - 0.5) * 40
        );

        scene.add(mesh);
        points.push({ mesh: mesh, cluster: -1 }); // Cluster -1 artinya belum ada grup
    }
}

function initCentroids() {
    // Hapus centroid lama jika ada
    centroids.forEach(c => scene.remove(c.mesh));
    centroids = [];

    const geometry = new THREE.SphereGeometry(1.5, 32, 32); // Lebih besar

    for (let i = 0; i < 3; i++) {
        const material = new THREE.MeshStandardMaterial({ 
            color: COLORS[i], 
            emissive: COLORS[i],
            emissiveIntensity: 0.5
        });
        const mesh = new THREE.Mesh(geometry, material);

        // Posisi Awal Centroid (Acak tapi berjauhan)
        mesh.position.set(
            (Math.random() - 0.5) * 30,
            2, 
            (Math.random() - 0.5) * 30
        );

        scene.add(mesh);
        centroids.push({ mesh: mesh, id: i });
    }
    stage = 1;
}

function assignClusters() {
    let changeCount = 0;

    points.forEach(point => {
        let minDist = Infinity;
        let closestCentroid = -1;

        // Cari centroid terdekat
        centroids.forEach((centroid, index) => {
            const dist = point.mesh.position.distanceTo(centroid.mesh.position);
            if (dist < minDist) {
                minDist = dist;
                closestCentroid = index;
            }
        });

        // Jika berubah cluster
        if (point.cluster !== closestCentroid) {
            point.cluster = closestCentroid;
            point.mesh.material.color.setHex(COLORS[closestCentroid]); // Ubah warna bola
            changeCount++;
        }
    });

    stage = 2;
    return changeCount;
}

function updateCentroidPositions() {
    centroids.forEach((centroid, index) => {
        // Cari rata-rata posisi semua titik milik centroid ini
        let sumX = 0, sumZ = 0, count = 0;
        
        points.forEach(point => {
            if (point.cluster === index) {
                sumX += point.mesh.position.x;
                sumZ += point.mesh.position.z;
                count++;
            }
        });

        if (count > 0) {
            // Pindahkan Centroid ke rata-rata baru (Lerping animasi bisa ditambahkan disini)
            const newX = sumX / count;
            const newZ = sumZ / count;
            
            // Geser langsung (bisa diperhalus dengan tweening nanti)
            centroid.mesh.position.x = newX;
            centroid.mesh.position.z = newZ;
        }
    });
    stage = 3;
}

// --- LOGIKA TOMBOL ---
function setupButtons() {
    const btnInit = document.getElementById('btn-init');
    const btnAssign = document.getElementById('btn-assign');
    const btnUpdate = document.getElementById('btn-update');
    const btnReset = document.getElementById('btn-reset');

    if(!btnInit) return; // Cegah error jika tombol tidak ada

    btnInit.addEventListener('click', () => {
        initCentroids();
        btnInit.disabled = true;
        btnAssign.disabled = false;
        btnReset.disabled = false;
    });

    btnAssign.addEventListener('click', () => {
        assignClusters();
        btnAssign.disabled = true;
        btnUpdate.disabled = false;
    });

    btnUpdate.addEventListener('click', () => {
        updateCentroidPositions();
        // Kembali ke tahap grouping untuk iterasi selanjutnya
        btnUpdate.disabled = true;
        btnAssign.disabled = false; 
    });

    btnReset.addEventListener('click', () => {
        generateRandomData(150);
        centroids.forEach(c => scene.remove(c.mesh));
        centroids = [];
        stage = 0;
        
        btnInit.disabled = false;
        btnAssign.disabled = true;
        btnUpdate.disabled = true;
    });
}