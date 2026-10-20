<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class TeacherSettingController extends Controller
{
    /**
     * Tampilkan Halaman Pengaturan KKM
     */
    public function index()
    {
        $kkmMiniQuiz    = Setting::get('kkm_mini_quiz', 70);
        $kkmEvaluasiBab = Setting::get('kkm_evaluasi_bab', 70);
        $kkmPostTest    = Setting::get('kkm_post_test', 70);

        return view('teacher.settings.index', compact(
            'kkmMiniQuiz',
            'kkmEvaluasiBab',
            'kkmPostTest'
        ));
    }

    /**
     * Simpan Perubahan Pengaturan KKM
     */
    public function update(Request $request)
    {
        $request->validate([
            'kkm_mini_quiz'    => 'required|integer|min:0|max:100',
            'kkm_evaluasi_bab' => 'required|integer|min:0|max:100',
            'kkm_post_test'    => 'required|integer|min:0|max:100',
        ]);

        Setting::set('kkm_mini_quiz', $request->kkm_mini_quiz);
        Setting::set('kkm_evaluasi_bab', $request->kkm_evaluasi_bab);
        Setting::set('kkm_post_test', $request->kkm_post_test);

        return redirect()->route('teacher.settings.index')
                         ->with('success', 'Pengaturan KKM berhasil diperbarui.');
    }
}