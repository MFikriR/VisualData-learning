import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

// --- VARIABEL GLOBAL MODUL ---
let scene, camera, renderer, controls;
let points = [];
let centroids = [];
let raycaster, mouse;
let dragPlane;
let isDragging = false;
let selectedCentroid = null;
let animationId;

// Warna Neon
const COLORS = [0xff0000, 0x00ff00, 0x0088ff]; // Merah, Hijau, Biru Terang

export function initBab2KMeans(container) {
    // 1. BERSIHKAN CONTAINER (Penting agar tidak menumpuk)
    container.innerHTML = '';
    
    // 2. SETUP SCENE
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0x050505); // Hitam Pekat
    scene.fog = new THREE.FogExp2(0x050505, 0.02);

    // 3. KAMERA
    camera = new THREE.PerspectiveCamera(60, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(0, 40, 40); // Posisi atas menyerong

    // 4. RENDERER
    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.shadowMap.enabled = true;
    container.appendChild(renderer.domElement);

    // 5. KONTROL ORBIT
    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.maxPolarAngle = Math.PI / 2 - 0.1; // Jangan tembus lantai

    // 6. CAHAYA
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
    scene.add(ambientLight);
    const dirLight = new THREE.DirectionalLight(0xffffff, 1);
    dirLight.position.set(10, 50, 20);
    dirLight.castShadow = true;
    scene.add(dirLight);

    // 7. LANTAI & ALAT BANTU
    const gridHelper = new THREE.GridHelper(60, 30, 0x333333, 0x111111);
    scene.add(gridHelper);

    // Bidang transparan untuk landasan drag mouse
    const planeGeo = new THREE.PlaneGeometry(100, 100);
    const planeMat = new THREE.MeshBasicMaterial({ visible: false });
    dragPlane = new THREE.Mesh(planeGeo, planeMat);
    dragPlane.rotation.x = -Math.PI / 2;
    dragPlane.position.y = 2; 
    scene.add(dragPlane);

    // 8. SETUP INTERAKSI
    raycaster = new THREE.Raycaster();
    mouse = new THREE.Vector2();

    // 9. BUAT OBJEK
    createDataPoints(100); // 100 Titik Data
    createCentroids();     // 3 Bola Besar

    // Hitung warna awal
    updateClustering();

    // 10. EVENT LISTENERS
    window.addEventListener('resize', () => onWindowResize(container));
    renderer.domElement.addEventListener('pointermove', onMouseMove);
    renderer.domElement.addEventListener('pointerdown', onMouseDown);
    renderer.domElement.addEventListener('pointerup', onMouseUp);

    // 11. MULAI ANIMASI
    animate();
}

function animate() {
    animationId = requestAnimationFrame(animate);
    controls.update();
    
    // Efek Denyut pada Centroid
    centroids.forEach((c, i) => {
        const scale = 1 + Math.sin(Date.now() * 0.005 + i) * 0.1;
        c.mesh.scale.set(scale, scale, scale);
    });

    renderer.render(scene, camera);
}

// --- FUNGSI PEMBUATAN OBJEK ---

function createDataPoints(count) {
    const geometry = new THREE.SphereGeometry(0.5, 16, 16);
    
    for (let i = 0; i < count; i++) {
        const material = new THREE.MeshStandardMaterial({ color: 0x555555 });
        const mesh = new THREE.Mesh(geometry, material.clone());
        
        // Posisi Acak
        mesh.position.set(
            (Math.random() - 0.5) * 50,
            0.5, 
            (Math.random() - 0.5) * 50
        );
        scene.add(mesh);

        // Buat Garis Penghubung (Awalnya tersembunyi/kecil)
        const lineGeo = new THREE.BufferGeometry().setFromPoints([mesh.position, mesh.position]);
        const lineMat = new THREE.LineBasicMaterial({ color: 0x555555, transparent: true, opacity: 0.3 });
        const line = new THREE.Line(lineGeo, lineMat);
        scene.add(line);

        points.push({ mesh, line });
    }
}

function createCentroids() {
    const geometry = new THREE.SphereGeometry(2.5, 32, 32); // BOLA BESAR
    const positions = [{x:-15, z:-10}, {x:15, z:-10}, {x:0, z:15}];

    for (let i = 0; i < 3; i++) {
        const material = new THREE.MeshStandardMaterial({ 
            color: COLORS[i], 
            emissive: COLORS[i], 
            emissiveIntensity: 0.6,
            roughness: 0.2
        });
        const mesh = new THREE.Mesh(geometry, material);
        mesh.position.set(positions[i].x, 2, positions[i].z);
        scene.add(mesh);
        
        // Cincin di bawah
        const ringGeo = new THREE.RingGeometry(3, 3.5, 32);
        const ringMat = new THREE.MeshBasicMaterial({ color: COLORS[i], side: THREE.DoubleSide });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        ring.rotation.x = -Math.PI / 2;
        ring.position.y = -1.9;
        mesh.add(ring);

        centroids.push({ mesh, id: i });
    }
}

// --- LOGIKA K-MEANS REALTIME ---

function updateClustering() {
    points.forEach(p => {
        let minDist = Infinity;
        let closestIndex = -1;

        // Cari centroid terdekat
        centroids.forEach((c, index) => {
            const dist = p.mesh.position.distanceTo(c.mesh.position);
            if (dist < minDist) {
                minDist = dist;
                closestIndex = index;
            }
        });

        if (closestIndex !== -1) {
            // Ubah Warna Titik
            p.mesh.material.color.setHex(COLORS[closestIndex]);
            
            // Update Garis Jarak
            const positions = new Float32Array([
                p.mesh.position.x, p.mesh.position.y, p.mesh.position.z,
                centroids[closestIndex].mesh.position.x, centroids[closestIndex].mesh.position.y, centroids[closestIndex].mesh.position.z
            ]);
            p.line.geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            p.line.geometry.attributes.position.needsUpdate = true;
            p.line.material.color.setHex(COLORS[closestIndex]);
        }
    });
}

// --- INTERAKSI DRAG & DROP ---

function onMouseDown(event) {
    const rect = renderer.domElement.getBoundingClientRect();
    mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
    mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

    raycaster.setFromCamera(mouse, camera);
    const intersects = raycaster.intersectObjects(centroids.map(c => c.mesh));

    if (intersects.length > 0) {
        isDragging = true;
        controls.enabled = false; // Matikan putaran kamera
        selectedCentroid = intersects[0].object;
        document.body.style.cursor = 'grabbing';
    }
}

function onMouseMove(event) {
    const rect = renderer.domElement.getBoundingClientRect();
    mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
    mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

    if (isDragging && selectedCentroid) {
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObject(dragPlane);
        
        if (intersects.length > 0) {
            // Pindahkan Centroid
            selectedCentroid.position.copy(intersects[0].point);
            selectedCentroid.position.y = 2; // Jaga ketinggian
            updateClustering(); // HITUNG ULANG JARAK
        }
    } else {
        // Efek Hover Cursor
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(centroids.map(c => c.mesh));
        document.body.style.cursor = intersects.length > 0 ? 'grab' : 'default';
    }
}

function onMouseUp() {
    isDragging = false;
    selectedCentroid = null;
    controls.enabled = true; // Hidupkan kamera lagi
    document.body.style.cursor = 'default';
}

function onWindowResize(container) {
    if(camera && renderer && container) {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    }
}