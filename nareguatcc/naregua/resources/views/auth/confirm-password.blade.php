<x-guest-layout>
    <div style="background-image: url('images/naregua5.jpg'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Confirme sua Senha</h5>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Esta é uma área segura do sistema. Por favor, confirme sua senha antes de continuar.') }}
                        </div>
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <!-- Senha -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Senha')" />
                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="d-grid mt-3">
                                <x-primary-button>
                                    {{ __('Confirmar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
