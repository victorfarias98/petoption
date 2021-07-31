<!DOCTYPE html>
<html lang="en">

<head>
@section('title', 'Login')
@include('auth.include.head')

</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                       <h1>{{ env('APP_NAME', 'PetOption'); }}</h1>
                    </div>
                    <h1 class="auth-title">Login.</h1>
                    <form action="{{ route('login.custom') }}" method="POST" enctype="multipart/form">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email"class="form-control form-control-xl" placeholder="Usuário">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password"class="form-control form-control-xl" placeholder="Senha">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Me mantenha logado
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Entrar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Ainda não tem conta? Está esperando o que? <a href="{{ route('register-user')}}"
                                class="font-bold">Cadastro</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Esqueci minha senha</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
