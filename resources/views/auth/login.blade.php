<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="formulario">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electronico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordad Usuario') }}</span>
                </label>
            </div>

            <div>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="register">
                    {{ __('Registrarse') }}
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿olvidadte tu contraseña?') }}
                    </a>
                @endif


                <x-jet-button class="ml-4">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formulario").addEventListener('submit', validarFormulario); 
            });

            function validarFormulario(evento) {
            evento.preventDefault();
            let usuario = document.getElementById('email').value;
            if(usuario.length == 0) {
                alert('No has escrito nada en el usuario');
                return;
            }
            let clave = document.getElementById('password').value;
            if (clave.length < 6) {
                alert('La clave no es válida');
                return;
            }
            this.submit();
            }

        </script>

    </x-jet-authentication-card>
</x-guest-layout>
