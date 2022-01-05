<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="shortcut icon" href="img/SmarHome.jpeg" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ asset('img/SmarHome.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('datetimepicker/jquery.datetimepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('css/styleW.css') }}">

    <title>Smartplusshouse</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    {{-- <link rel="stylesheet" href="css/responsive.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li class="hidden"><a href="#"><i class="fa fa-user"></i> Mi Cuenta</a></li>
                            <!-- Solo se muestra cuando se está logeado -->
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> Lista de deseos</a></li> --}}
                            <li><a href="https://wa.me/message/P3Z4SEURODT2I1" target="_blank"><i class="fa fab fa-whatsapp"></i> Whatsapp</a></li>
                            {{-- <li><a href="#"><i class="fa fa-money"></i> Checkout</a></li> --}}
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa far fa-edit"></i> Registrarse</a>
                                </li>
                            @endif

                            <li class="hidden"><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            <!--Solo se muestra cuando están logeados -->
                            @can('Session')
                                <li class="nav-item">

                                    <a class="nav-link active" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endcan
                            @can('Dashboard')
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('perfil.index') }}"><i
                                            class="fa fa-key"></i>Dashboard</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>

                {{-- <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        class="key">Moneda :</span><span class="value">USD </span><b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">Bs</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        class="key">Idioma :</span><span class="value">Español
                                    </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Español</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="xp" style="padding-top: 1rem">
                        <h1><a class="logoo"><img src="{{ asset('img/SmarHome.jpeg') }}"
                                    class="logu" alt="Logo">Smartplusshouse</a></h1>
                        <h1><a href="#"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="{{ route('fservicio.show', $venta) }}">Carrito - <span
                                class="cart-amunt">Bs{{ $venta->montoTotal }}</span> <i
                                class="fa fa-shopping-cart"></i> {{-- <span class="product-count">5</span> --}}</a>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End site branding area -->





    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('homex.index') }}">Inicio</a></li>
                        @can('Session')
                        <li ><a href="{{ route('front.create') }}">Productos</a></li>
                        <li class="active"><a href="{{route('payment.create')}} ">Servicios</a></li>


                        <li><a href="{{ route('payment.index') }}">Facturas</a></li>
                        @endcan
                        <li><a href="{{ route('front.index') }}">Nuestra Empresa</a></li>
                        <li class="hidden"><a href="#">Dashboard</a></li><!-- Acceso autorizado -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{--  --}}


    <!-- End main content area  -->

    @if (session()->has('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> {{ session()->get('error') }}
        </div>
    @endif

    @if (session()->has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Éxito!</strong> {{ session()->get('success') }}
    </div>
@endif

    <div class="main1" style="padding-left: 2rem">
        <h1>Servicios</h1>
        @foreach ($servicios as $servicio)

            <div class="card1">
                <form method="post" action="{{ route('pagoserv.store') }}">
                    @csrf
                    <div class="image1">
                        <img src="{{ $servicio->url }}">
                    </div>
                    <div class="title1" style="display: flex; justify-content: center">
                        <input style="padding-right: rem" value="{{ $servicio->id }}" name="servicio_id" hidden>
                        <input type="text" name="venta_id" value="{{ $venta_id }}" hidden>
                        @foreach ($tservicios as $tservicio)
                            @if ($servicio->Id_tp == $tservicio->id)
                                <h1 style="padding-left: 0.65rem" class="leo"> {{ $tservicio->nombre }} </h1>
                            @endif
                        @endforeach
                    </div>
                    <p class="card-text" style="display: flex; justify-content: center"> <b>Modalidad
                        :</b>{{ $servicio->descripción }}</p>
                    
                    <p class="card-text" style="display: flex; justify-content: center">
                        <b>Bs</b>{{ $servicio->precio }}
                    </p>
                    <div class="des1">

                        <p class="card-text"> <b>Cantidad :</b></p>
                        <input type="text" name="cantidad" style="width: 40%; margin-left: auto;margin-right: auto"
                            class="focus border-primary  form-control">
                        <br>
                        <button class="btn btn-primary" type="submit">Añadir a carrito</button>
                        <br>
                        <br>

                    </div>
                </form>
            </div>

        @endforeach
    </div>

    <!-- End product widget area -->

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>Tienda de camaras</span></h2>
                        <p>Visite nuestras redes sociales</p>
                        <div class="footer-social">

                            <a href="https://wa.me/message/P3Z4SEURODT2I1" target="_blank"><i
                                    class="fa fab fa-whatsapp"></i></a>

                            <a target="_blank" href="https://github.com/LeoMogiano/Proyecto-SI1"><i
                                    class="fa fa-github-square"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Navegacion del Usuario</h2>
                        <ul>
                            <li><a href="#">Mi Cuenta</a></li>
                            <li><a href="#">Historial de pedidos</a></li>
                            <li><a href="#">Lista de deseos</a></li>
                            <li><a href="#">Contacto Del Vendedor</a></li>
                            <li><a href="#">Pagina Principal</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categoria</h2>
                        <ul>
                            <li><a href="#">Camara </a></li>
                            {{-- <li><a href="#">Camara</a></li> --}}
                            {{-- <li><a href="#">Camara</a></li>
                            <li><a href="#">Camara</a></li>
                            <li><a href="#">Camara</a></li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Titulo</h2>
                        <p>Suscríbase a nuestro boletín y obtenga ofertas exclusivas que no encontrará en
                            ningún
                            otro lugar directamente en su bandeja de entrada.</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p style="color: rgb(0, 0, 0)"><b>&copy; uagrm </b><a href="!#" target="_blank"
                                style="color: #fff">Smartplusshouse</a></p>
                    </div>
                </div>

                {{-- <div class="col-md-4">
                            <div class="footer-card-icon">
                                <i class="fa fa-cc-discover"></i>
                                <i class="fa fa-cc-mastercard"></i>
                                <i class="fa fa-cc-paypal"></i>
                                <i class="fa fa-cc-visa"></i>
                            </div> --}}
            </div>
        </div>
    </div>
    <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    {{-- <script src="js/owl.carousel.min.js"></script> --}}
    {{-- <script src="js/jquery.sticky.js"></script> --}}
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>

    <!-- jQuery easing -->
    {{-- <script src="js/jquery.easing.1.3.min.js"></script> --}}
    <script src="{{ asset('js/jquery.easing.1.3.min.js') }}"></script>
    <!-- Main Script -->
    {{-- <script src="js/main.js"></script> --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('datetimepicker/jquery.js') }}"></script>
    <script src="{{ asset('datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery('#datetimepicker').datetimepicker();
        });
    </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxph9T1koe4cRoEUGVAgFgvDFhqpgFYCU&callback=initMap">
    </script>
</body>

</html>
