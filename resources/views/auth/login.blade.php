<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-neutral-950 text-neutral-200 selection:bg-red-600 selection:text-white">
        
        <div class="mb-8 animate-fade-in text-center">
            <h1 class="text-4xl font-extrabold tracking-wider text-white">
                <span class="text-red-600">COMEBACK</span> EVENTOS
            </h1>
            <p class="text-sm text-neutral-500 mt-2 tracking-widest uppercase">Painel Administrativo</p>
        </div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-neutral-900 border border-neutral-800 shadow-2xl rounded-2xl backdrop-blur-sm">
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-neutral-400 mb-2">E-mail Corporativo</label>
                    <input id="email" class="block mt-1 w-full bg-neutral-950 border border-neutral-800 text-white rounded-xl px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-200 placeholder-neutral-600" 
                           type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seu@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-neutral-400">Senha de Acesso</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-neutral-500 hover:text-red-500 transition-colors duration-200" href="{{ route('password.request') }}">
                                Esqueceu?
                            </a>
                        @endif
                    </div>
                    <input id="password" class="block mt-1 w-full bg-neutral-950 border border-neutral-800 text-white rounded-xl px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-200 placeholder-••••••••" 
                           type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-neutral-950 border-neutral-800 text-red-600 focus:ring-red-600 focus:ring-offset-neutral-900" name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-neutral-400 select-none cursor-pointer hover:text-neutral-300 transition-colors">Manter conectado</label>
                </div>

                <div>
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-bold py-3 px-4 rounded-xl text-sm tracking-wide uppercase transition-all duration-200 shadow-lg shadow-red-900/20 hover:shadow-red-600/20 transform hover:-translate-y-0.5">
                        Entrar no Painel
                    </button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="mt-8 pt-6 border-t border-neutral-800 text-center">
                    <p class="text-sm text-neutral-500">
                        Novo por aqui? 
                        <a href="{{ route('register') }}" class="text-red-500 hover:text-red-400 font-semibold ml-1 transition-colors duration-200">
                            Crie sua conta administrativa
                        </a>
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>