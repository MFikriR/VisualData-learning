<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <div>
            <label for="update_password_password" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Password Baru</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Konfirmasi Password Baru</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400 text-xs" />
        </div>

        <div class="flex items-center gap-4 pt-6 border-t border-slate-700">
            <button type="submit" class="px-8 py-3.5 bg-slate-700 hover:bg-slate-600 text-white rounded-xl font-bold shadow-lg transition-all transform hover:-translate-y-1">
                🔑 Ganti Password
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="flex items-center gap-2 text-sm text-emerald-400 font-bold bg-emerald-500/10 px-4 py-2 rounded-lg border border-emerald-500/20">
                    <span>✓</span> Password Diperbarui!
                </div>
            @endif
        </div>
    </form>
</section>