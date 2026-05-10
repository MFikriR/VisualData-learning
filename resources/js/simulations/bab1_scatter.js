import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

// --- VARIABEL MODULE SCOPE ---
// Variabel ini "hidup" selama file ini dimuat di memori
let scene, camera, renderer, controls;
let points = [];
let centroids = [];
let stage = 0; // 0: Awal, 1: Centroid Dibuat, 2: Grouping, 3: Update Posisi
let animationId; // Untuk stop animasi saat pindah halaman

const COLORS = [0xff4d4d, 0x4ade80, 0x3b82f6]; 
const NEUTRAL_COLOR = 0xffffff;

// --- FUNGSI UTAMA (EXPORT) ---
export function initBab1Scatter(container) {
    // Bersihkan scene lama jika ada (untuk safety)
    cleanup();

    // 1. Setup Three.js
    setupScene(container);

    // 2. Setup Logika Tombol
    setupButtons();

    // 3. Generate Data Awal
    generateRandomData(150);
}

// --- FUNGSI INTERNAL (HELPER) ---

function cleanup() {
    if (animationId) cancelAnimationFrame(animationId);
    if (renderer) renderer.dispose();
    if (scene) scene.clear();
    points = [];
    centroids = [];
    stage = 0;
}

function setupScene(container) {
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0x0d0e10);
    scene.fog = new THREE.FogExp2(0x0d0e10, 0.02);

    camera = new THREE.PerspectiveCamera(60, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(30, 30, 50);

    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.innerHTML = ''; // Pastikan container kosong
    container.appendChild(renderer.domElement);

    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;

    // Pencahayaan
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);
    const pointLight = new THREE.PointLight(0xffffff, 1);
    pointLight.position.set(20, 20, 20);
    scene.add(pointLight);

    // Grid
    const gridHelper = new THREE.GridHelper(50, 20, 0x333333, 0x111111);
    scene.add(gridHelper);

    // Animasi Loop
    function animate() {
        animationId = requestAnimationFrame(animate);
        controls.update();
        
        // Animasi Centroid "Bernafas"
        centroids.forEach((c, index) => {
            c.mesh.position.y = 2 + Math.sin(Date.now() * 0.003 + index) * 0.5;
        });

        renderer.render(scene, camera);
    }
    animate();

    // Responsive
    window.addEventListener('resize', () => {
        if(container && camera && renderer) {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        }
    });
}

function generateRandomData(count) {
    // Hapus mesh lama
    points.forEach(p => scene.remove(p.mesh));
    points = [];

    const geometry = new THREE.SphereGeometry(0.5, 16, 16);
    const material = new THREE.MeshStandardMaterial({ color: NEUTRAL_COLOR, metalness: 0.5, roughness: 0.5 });

    for (let i = 0; i < count; i++) {
        const mesh = new THREE.Mesh(geometry, material.clone());
        mesh.position.set(
            (Math.random() - 0.5) * 40,
            Math.random() * 5 + 0.5,
            (Math.random() - 0.5) * 40
        );
        scene.add(mesh);
        points.push({ mesh: mesh, cluster: -1 });
    }
}

function initCentroids() {
    centroids.forEach(c => scene.remove(c.mesh));
    centroids = [];

    const geometry = new THREE.SphereGeometry(1.5, 32, 32);

    for (let i = 0; i < 3; i++) {
        const material = new THREE.MeshStandardMaterial({ 
            color: COLORS[i], emissive: COLORS[i], emissiveIntensity: 0.5 
        });
        const mesh = new THREE.Mesh(geometry, material);
        mesh.position.set(
            (Math.random() - 0.5) * 30, 2, (Math.random() - 0.5) * 30
        );
        scene.add(mesh);
        centroids.push({ mesh: mesh, id: i });
    }
    stage = 1;
}

function assignClusters() {
    points.forEach(point => {
        let minDist = Infinity;
        let closestCentroid = -1;

        centroids.forEach((centroid, index) => {
            const dist = point.mesh.position.distanceTo(centroid.mesh.position);
            if (dist < minDist) {
                minDist = dist;
                closestCentroid = index;
            }
        });

        if (point.cluster !== closestCentroid) {
            point.cluster = closestCentroid;
            point.mesh.material.color.setHex(COLORS[closestCentroid]);
        }
    });
    stage = 2;
}

function updateCentroidPositions() {
    centroids.forEach((centroid, index) => {
        let sumX = 0, sumZ = 0, count = 0;
        points.forEach(point => {
            if (point.cluster === index) {
                sumX += point.mesh.position.x;
                sumZ += point.mesh.position.z;
                count++;
            }
        });
        if (count > 0) {
            centroid.mesh.position.x = sumX / count;
            centroid.mesh.position.z = sumZ / count;
        }
    });
    stage = 3;
}

function setupButtons() {
    // Kita ambil elemen by ID. 
    // PASTIKAN ID INI ADA DI show.blade.php
    const btnInit = document.getElementById('btn-init');
    const btnAssign = document.getElementById('btn-assign');
    const btnUpdate = document.getElementById('btn-update');
    const btnReset = document.getElementById('btn-reset');

    if (btnInit) {
        // Reset state tombol saat load
        btnInit.disabled = false;
        btnAssign.disabled = true;
        btnUpdate.disabled = true;
        btnReset.disabled = true;

        // Clone element untuk menghapus event listener lama (penting di SPA/PJAX)
        // Atau cukup assign onclick langsung
        btnInit.onclick = () => {
            initCentroids();
            btnInit.disabled = true;
            btnAssign.disabled = false;
            btnReset.disabled = false;
        };

        btnAssign.onclick = () => {
            assignClusters();
            btnAssign.disabled = true;
            btnUpdate.disabled = false;
        };

        btnUpdate.onclick = () => {
            updateCentroidPositions();
            btnUpdate.disabled = true;
            btnAssign.disabled = false;
        };

        btnReset.onclick = () => {
            generateRandomData(150);
            centroids.forEach(c => scene.remove(c.mesh));
            centroids = [];
            stage = 0;
            btnInit.disabled = false;
            btnAssign.disabled = true;
            btnUpdate.disabled = true;
        };
    }
}