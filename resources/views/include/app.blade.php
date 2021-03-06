<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME', 'Petz'); }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/">{{ env('APP_NAME', 'Petz'); }}</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="/" class="sidebar-link">

                                <span>Home</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Route::currentRouteName() == 'pets.index' ? 'active' : '' }} has-sub">
                            <a href="#" class="sidebar-link">
                                <span>Pets</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item {{ Route::currentRouteName() == 'pets.index' ? 'active' : '' }}">
                                    <a href="{{ route('pets.index') }}">Lista</a>
                                </li>
                                <li class="submenu-item {{ Route::currentRouteName() == 'pets.create' ? 'active' : '' }}">
                                    <a href="{{ route('pets.create') }}">Cadastrar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('signout')}}">Sair</a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('title')</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy;{{ env('APP_NAME', 'Petz'); }}</p>
                    </div>
                    <div class="float-end">
                        <p>Feito com <span class="text-danger"><i class="bi bi-heart"></i></span> por <a
                                href="https://agenciaponte.com.br">Ag??ncia Ponte</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/d35eff7b0a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @flasher_render
    <script>
        $(document).ready(function() {
            function limpa_formul??rio_cep() {
                $("#street").val("");
                $("#district").val("");
                $("#city").val("");
                $("#state").val("");
                $("#ibge").val("");
            }
            $("#zip_code").blur(function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if(validacep.test(cep)) {
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {

                                $("#street").val(dados.logradouro);
                                $("#district").val(dados.bairro);
                                $("#city").val(dados.localidade);
                                $("#state").val(dados.uf);
                            }
                            else {
                                limpa_formul??rio_cep();
                                alert("CEP n??o encontrado.");
                            }
                        });
                    }
                    else {
                        limpa_formul??rio_cep();
                    }
                }
                else {
                    limpa_formul??rio_cep();
                }
            });
        });

    </script>
</body>

</html>
