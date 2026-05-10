<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Foto Profil --}}
        <div>
            <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Foto Profil Akun</label>
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                <div class="relative group shrink-0">
                    <img id="preview-image" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-28 h-28 rounded-2xl object-cover border-2 border-slate-600 bg-slate-900 shadow-lg">
                </div>

                <div class="w-full">
                    <label class="flex items-center justify-center sm:justify-start gap-2 cursor-pointer w-full sm:w-max text-sm font-bold text-blue-400 bg-blue-500/10 hover:bg-blue-500/20 px-5 py-3.5 rounded-xl border border-blue-500/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Pilih Foto Baru</span>
                        <input type="file" id="upload-image" name="photo" accept="image/*" class="hidden" />
                    </label>
                    <p class="text-xs text-slate-500 mt-3 text-center sm:text-left">Format JPG, PNG, atau GIF. Maksimal 2MB.</p>
                    <x-input-error class="mt-2 text-red-400 text-xs" :messages="$errors->get('photo')" />
                </div>
            </div>
        </div>

        {{-- Nama Lengkap --}}
        <div>
            <label for="name" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all">
            <x-input-error class="mt-2 text-red-400 text-xs" :messages="$errors->get('name')" />
        </div>

        {{-- Jenis Kelamin --}}
        <div>
            <label for="gender" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Jenis Kelamin</label>
            <div class="relative">
                <select id="gender" name="gender" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all appearance-none cursor-pointer">
                    <option value="" disabled {{ is_null($user->gender) ? 'selected' : '' }}>-- Pilih Jenis Kelamin --</option>
                    <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Laki-laki 👨</option>
                    <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Perempuan 👩</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>
            <x-input-error class="mt-2 text-red-400 text-xs" :messages="$errors->get('gender')" />
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Email Akses</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all">
            <x-input-error class="mt-2 text-red-400 text-xs" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-amber-500/10 border border-amber-500/30 rounded-xl text-sm text-amber-400">
                    {{ __('Email Anda belum diverifikasi.') }}
                    <button form="send-verification" class="underline hover:text-amber-300 font-bold ml-1">
                        {{ __('Kirim ulang verifikasi.') }}
                    </button>
                </div>
            @endif
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center gap-4 pt-6 border-t border-slate-700">
            <button type="submit" class="px-8 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white rounded-xl font-bold shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 flex gap-2 items-center">
                💾 Simpan Profil
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="flex items-center gap-2 text-sm text-emerald-400 font-bold bg-emerald-500/10 px-4 py-2 rounded-lg border border-emerald-500/20">
                    <span>✓</span> Tersimpan!
                </div>
            @endif
        </div>
    </form>

    {{-- MODAL CROPPER --}}
    <div id="crop-modal" class="fixed inset-0 z-[999] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-slate-900/90 backdrop-blur-sm" aria-hidden="true"></div>
            
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-slate-800 border border-slate-700 rounded-3xl shadow-2xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full relative z-10">
                <div class="px-6 pt-6 pb-4 sm:p-8">
                    <h3 class="text-xl font-black text-white mb-4 flex items-center gap-2">
                        <span>✂️</span> Atur Ukuran Foto
                    </h3>
                    <div class="img-container relative h-[300px] w-full bg-slate-900 rounded-xl overflow-hidden border border-slate-700">
                        <img id="image-to-crop" src="" class="block max-w-full">
                    </div>
                    <p class="text-xs text-slate-400 mt-4 text-center">Geser dan perbesar kotak untuk memilih area yang pas.</p>
                </div>
                
                <div class="px-6 py-4 bg-slate-900/50 border-t border-slate-700 sm:flex sm:flex-row-reverse gap-3">
                    <button type="button" id="crop-btn" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-6 py-3 bg-eduPrimary text-base font-bold text-white hover:bg-blue-700 focus:outline-none sm:w-auto sm:text-sm transition-colors">
                        Potong & Terapkan
                    </button>
                    <button type="button" id="cancel-crop-btn" class="mt-3 w-full inline-flex justify-center rounded-xl border border-slate-600 shadow-sm px-6 py-3 bg-slate-800 text-base font-bold text-slate-300 hover:bg-slate-700 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm transition-colors">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const uploadInput = document.getElementById('upload-image');
        const modal = document.getElementById('crop-modal');
        const imageToCrop = document.getElementById('image-to-crop');
        const cropBtn = document.getElementById('crop-btn');
        const cancelBtn = document.getElementById('cancel-crop-btn');
        const previewImage = document.getElementById('preview-image');
        let cropper;

        uploadInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files && files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageToCrop.src = e.target.result;
                    modal.classList.remove('hidden');
                    if (cropper) cropper.destroy();
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1, 
                        viewMode: 1,
                        autoCropArea: 1,
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        cropBtn.addEventListener('click', function() {
            const canvas = cropper.getCroppedCanvas({ width: 400, height: 400 });
            canvas.toBlob(function(blob) {
                const croppedFile = new File([blob], 'profile_cropped.jpg', { type: 'image/jpeg' });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(croppedFile);
                uploadInput.files = dataTransfer.files;
                previewImage.src = URL.createObjectURL(croppedFile);
                modal.classList.add('hidden');
            }, 'image/jpeg');
        });

        cancelBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
            uploadInput.value = ''; 
        });
    });
</script>