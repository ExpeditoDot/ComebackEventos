<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-neutral-950 text-neutral-200 selection:bg-red-600 selection:text-white">
        
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-wider text-white">
                <span class="text-red-600">COMEBACK</span> EVENTOS
            </h1>
            <p class="text-sm text-neutral-500 mt-2 tracking-widest uppercase">Nova Conta Administrativa</p>
        </div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-neutral-900 border border-neutral-800 shadow-2xl rounded-2xl backdrop-blur-sm">

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-neutral-400 mb-2">Nome Completo</label>
                    <input id="name" class="block mt-1 w-full bg-neutral-950 border border-neutral-800 text-white rounded-xl px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-200 placeholder-neutral-600" 
                           type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Seu nome" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-neutral-400 mb-2">E-mail</label>
                    <input id="email" class="block mt-1 w-full bg-neutral-950 border border-neutral-800 text-white rounded-xl px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-200 placeholder-neutral-600" 
                           type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seu@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-neutral-400 mb-2">Senha</label>
                    <input id="password" class="block mt-1 w-full bg-neutral-950 border border-neutral-800 text-white rounded-xl px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-200 placeholder-••••••••" 
                           type="password" name="password" required autocomplete="new-password" placeholder="Mínimo 8 caracteres" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-neutral-400 mb-2">Confirmar Senha</label>
                    <input id="password_confirmation" class="block mt-1 w-full bg-neutral-950 border border-neutral-800 text-white rounded-xl px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-200 placeholder-••••••••" 
                           type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repita a senha" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-500" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-bold py-3 px-4 rounded-xl text-sm tracking-wide uppercase transition-all duration-200 shadow-lg shadow-red-900/20 hover:shadow-red-600/20 transform hover:-translate-y-0.5">
                        Concluir Cadastro
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-neutral-800 text-center">
                <p class="text-sm text-neutral-500">
                    Já tem uma conta? 
                    <a href="{{ route('login') }}" class="text-red-500 hover:text-red-400 font-semibold ml-1 transition-colors duration-200">
                        Fazer Login
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>