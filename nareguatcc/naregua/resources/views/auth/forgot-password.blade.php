<x-guest-layout>
    <div style="background-image: url('images/naregua5.jpg'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Esqueceu sua Senha?</h5>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Esqueceu sua senha? Sem problemas. Informe seu endereço de e-mail e enviaremos um link para redefinir sua senha.') }}
                        </div>

                        <!-- Status da Sessão -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Campo de Email -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="d-grid mt-3">
                                <x-primary-button>
                                    {{ __('Enviar Link para Redefinir Senha') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
