import './bootstrap';
import Alpine from 'alpinejs';

// Import modul simulasi
import { initBab1Scatter } from './simulations/bab1_scatter.js';
import { initBab2KMeans } from './simulations/bab2_kmeans.js';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('three-canvas-container');
    
    if (container) {
        // Ambil tipe simulasi dari atribut HTML
        const simType = container.getAttribute('data-sim-type');
        
        console.log("🚀 System Start. Tipe Simulasi:", simType);

        if (simType === 'simulasi-3d-sebaran') {
            console.log("✅ Memuat Bab 1: Scatter Plot");
            initBab1Scatter(container);
        } 
        else if (simType === 'simulasi-3d-jarak-clustering') {
            console.log("✅ Memuat Bab 2: K-Means Interactive");
            initBab2KMeans(container);
        }
        else {
            console.warn("⚠️ Tipe simulasi tidak dikenali:", simType);
        }
    }
});