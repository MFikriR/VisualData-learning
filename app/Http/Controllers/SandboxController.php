<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function index()
    {
        // Sandbox tidak butuh data dari database, murni client-side (JS)
        return view('student.sandbox.index');
    }
}