<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting; // Jika menggunakan tabel settings/options

class TeacherSettingController extends Controller
{
    public function index()
    {
        // Mengambil nilai KKM dari DB / Config / Default 70
        $kkm_mini_quiz = Setting::get('kkm_mini_quiz', 70);
        $kkm_evaluasi_bab = Setting::get('kkm_evaluasi_bab', 70);
        $kkm_post_test = Setting::get('kkm_post_test', 70);

        return view('teacher.settings.index', compact('kkm_mini_quiz', 'kkm_evaluasi_bab', 'kkm_post_test'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kkm_mini_quiz' => 'required|numeric|min:0|max:100',
            'kkm_evaluasi_bab' => 'required|numeric|min:0|max:100',
            'kkm_post_test' => 'required|numeric|min:0|max:100',
        ]);

        Setting::set('kkm_mini_quiz', $request->kkm_mini_quiz);
        Setting::set('kkm_evaluasi_bab', $request->kkm_evaluasi_bab);
        Setting::set('kkm_post_test', $request->kkm_post_test);

        return redirect()->back()->with('success', 'Kriteria Ketuntasan Minimal (KKM) berhasil diperbarui.');
    }
}