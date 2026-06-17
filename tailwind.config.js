import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Mengganti Figtree menjadi Plus Jakarta Sans agar senada dengan UI
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Palet Warna Cream & Forest Green (Color Hunt)
                eduPrimary: '#306d29',       // Hijau Utama (Tombol & Aksen)
                eduPrimaryHover: '#0d530e',  // Hijau Gelap (Hover Tombol)
                eduDark: '#fbf5dd',          // Krem Terang (Background Utama)
                eduPanel: '#e7e1b1',         // Krem Gelap (Kotak Input/Card)
                eduAccent: '#306d29',        // Hijau (Sorotan Teks/Ikon)
                borderLight: 'rgba(48, 109, 41, 0.2)', // Border Hijau Transparan
            },
        },
    },

    plugins: [forms],
};