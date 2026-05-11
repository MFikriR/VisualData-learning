<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\URL; // <-- Import URL Facade
use App\Models\Chapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Memaksa Laravel menggunakan HTTPS saat di hosting (Mode Production)
        // Ini akan memperbaiki tampilan CSS yang hancur dan error "Not Secure"
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // 2. Fix untuk panjang string default MySQL lama
        Schema::defaultStringLength(191);

        // 3. LOGIKA SIDEBAR GLOBAL
        // Mengirim data $globalChapters ke layout 'app_learning'
        View::composer('layouts.app_learning', function ($view) {
            
            // Perbaikan Query:
            // 1. Load 'materials' dan urutkan berdasarkan sequence
            // 2. Load 'quiz' (PENTING: Agar tombol evaluasi muncul)
            $chapters = Chapter::with([
                'materials' => function($query) {
                    $query->orderBy('sequence', 'asc');
                },
                'quiz' // <--- INI KUNCI AGAR EVALUASI BAB 2 MUNCUL
            ])
            ->orderBy('sequence', 'asc')
            ->get();

            $view->with('globalChapters', $chapters);
        });
    }
}