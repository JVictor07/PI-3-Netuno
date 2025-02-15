<x-guest-layout>
    <header>
        <div class="header-principal bg-light d-flex align-items-center">
            <div class=" dsk-container-4x1 sm-container-4x8 "></div>
            <div class="logo-header bg-primary dsk-container-4x4 sm-container-4x9"></div>
        </div>
        <div class="header-secondary bg-light d-flex align-items-center">
            <div class=" dsk-container-4x1"></div>
            <div class=" dsk-container-4x4 sm-container-4x19">
                <p class="m-0 font-weight-bold h5">Acesse sua conta</p>
                <p class="m-0 ">home > Acessar</p>
            </div>
        </div>
    </header>

    <div class="row m-0 heigth-dsk m-auto p-0 py-5 justify-content-center dsk-container-4x25 align-items-center ">
        <div class=" dsk-container-4x17 sm-container-4x23 d-flex sombrinha">
            <div class=" row m-0 p-0 justify-content-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class=" dsk-container-4x9 sm-container-4x23 borda-right text-center justify-content-center py-5">

                        <x-input class="dsk-container-4x7 sm-container-4x21 m-0 py-2 mb-4" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus/>

                        <x-input class="dsk-container-4x7 sm-container-4x21 m-0 py-2 mb-2" placeholder="Senha" type="password" name="password" required autocomplete="current-password"/>

                        @if (Route::has('password.request'))
                            <a class="d-block mb-4 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Esqueci a senha') }}
                            </a>
                        @endif

                        <button class="dsk-container-4x7 sm-container-4x21 m-0 py-3 btn btn-primary">Entrar</button>

                    </div>
                </form>

                <div class="dsk-container-4x8 sm-container-4x23 py-5 ">
                    <div class="h-100 d-flex  align-items-center justify-content-center">

                    <a href="{{ route('register') }}" class="text-uppercase dsk-container-4x6 m-0 sm-container-4x21 btn btn-primary">Pirmeiro Acesso?
                        <span class=" d-block">Cadastre-se</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
