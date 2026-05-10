<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage; // <--- Tambahkan ini

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $dataToUpdate = $request->validated();

        // === LOGIKA UPLOAD FOTO ===
        if ($request->hasFile('photo')) {
            // 1. Hapus foto lama jika ada (agar server tidak penuh)
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // 2. Simpan foto baru ke folder 'profile-photos' di disk public
            $path = $request->file('photo')->store('profile-photos', 'public');
            
            // 3. Masukkan path ke data yang akan diupdate
            $dataToUpdate['profile_photo_path'] = $path;
        }

        // Hapus 'photo' dari array karena kolom di database namanya 'profile_photo_path'
        unset($dataToUpdate['photo']); 

        // === UPDATE DATA USER ===
        $user->fill($dataToUpdate);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
