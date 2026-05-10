<section class="space-y-6">
    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="px-6 py-3.5 bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/30 rounded-xl font-bold transition-colors">
        Hapus Akun Saya Permanen
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-slate-800 border border-slate-700 rounded-2xl">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-white mb-2">
                ⚠️ Konfirmasi Hapus Akun
            </h2>

            <p class="text-sm text-slate-400 mb-6 leading-relaxed">
                Tindakan ini tidak dapat dibatalkan. Semua data nilai evaluasi, progres materi, dan portofolio Anda akan dihapus permanen. Silakan masukkan password Anda untuk mengonfirmasi.
            </p>

            <div class="mb-8">
                <label for="password" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Password Anda</label>
                <input id="password" name="password" type="password" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all placeholder-slate-600" placeholder="Ketik password untuk konfirmasi">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400 text-xs" />
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-slate-700">
                <button type="button" x-on:click="$dispatch('close')" class="px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white font-bold rounded-xl transition-colors">
                    Batal
                </button>

                <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-lg shadow-red-500/20 transition-colors">
                    Ya, Hapus Akun
                </button>
            </div>
        </form>
    </x-modal>

    {{-- Fix Global untuk Modal Background Laravel Breeze --}}
    <style>
        .dark .bg-white { background-color: #1e293b !important; }
    </style>
</section>