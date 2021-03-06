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
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
                            <!-- Solo se muestra cuando se est?? logeado -->
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> Lista de deseos</a></li> --}}
                            <li><a href="https://wa.me/message/P3Z4SEURODT2I1" target="_blank"><i class="fa fab fa-whatsapp"></i> Whatsapp</a></li>
                            {{-- <li><a href="#"><i class="fa fa-money"></i> Checkout</a></li> --}}
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa far fa-edit"></i> Registrarse</a>
                                </li>
                            @endif

                            <li class="hidden"><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            <!--Solo se muestra cuando est??n logeados -->
                            @can('Session')
                                <li class="nav-item">

                                    <a class="nav-link active" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                        {{ __('Cerrar Sesi??n') }}
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
                                        class="key">Idioma :</span><span class="value">Espa??ol
                                    </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Espa??ol</a></li>
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

                {{-- <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="#">Carrito - <span class="cart-amunt">$800</span> <i
                                class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div> --}}
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
                        <li class="active"><a href="{{ route('front.create') }}">Productos</a></li>
                        <li><a href="{{route('payment.create')}}">Servicios</a></li>

                        
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


    <!-- End main content area
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Brands</h2>
                        <div class="brand-list">
                            <img src="img/services_logo__1.jpg" alt="">
                            <img src="img/services_logo__2.jpg" alt="">
                            <img src="img/services_logo__3.jpg" alt="">
                            <img src="img/services_logo__4.jpg" alt="">
                            <img src="img/services_logo__1.jpg" alt="">
                            <img src="img/services_logo__2.jpg" alt="">
                            <img src="img/services_logo__3.jpg" alt="">
                            <img src="img/services_logo__4.jpg" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  End brands area -->

    {{-- <div class="product-widget-area" style="width: 500px;">

        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>??Error!</strong> {{ session()->get('error') }}
                </div>
            @endif
                NO ESTABA
            <div class="card">

                <div class="card-body ">

                    <form method="post" action="{{ route('dventas.store') }}">
                        @csrf

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($productos as $producto)
                                <div class="col ">
                                    <div class="card h-100">
                                        <img href="img/SmarHome.jpeg" class="card-img-top" width="200" height="300"
                                            alt="...">
                                        <div class="card-body ">
                                            <h5 class="card-title"> {{ $producto->id }}</h5>
                                            <p class="card-text">{{ $producto->nombre }}</p>
                                        </div>
                                        <div class="card-footer"> --}}


    {{-- @can('gestionar usuario')
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('categorias.edit', $categorias) }}">Editar</a>
                                @endcan

                                <form action="{{ route('categorias.destroy', $categorias) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @can('gestionar usuario')
                                        <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                            onclick="return confirm('??EST?? SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>
                                    @endcan

                                </form> --}}
    {{-- </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    No ESTABA
                        <div class="form-group row-cols-md-3">
                            <h5>Seleccionar Producto:</h5>
                            <select name="producto_id" class="focus border-primary  form-control">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach

                            </select>
                        </div> --}}

    {{-- Ya ESTABA <input type="text" name="venta_id" value="{{ $venta_id }}" class="focus border-primary  form-control"
                    hidden> --}}

    {{-- <div class="form-group row-cols-md-3">
                            <h5>Cantidad:</h5>
                            <input type="text" name="cantidad" class="focus border-primary  form-control" required>

                        </div>


                        <br>
                        <div class="form-group row-cols-md-3">
                            <button class="btn btn-primary" type="submit">Registrar</button> --}}
    {{-- YA ESTABA <a class="btn btn-danger" href="{{ route('ventas.show', $venta_id) }}">Volver</a> --}}
    {{-- return redirect()->route('ventas.show',$request->venta_id); YA ESTABA --}}
    {{-- </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <form method="post" action="{{ route('dventas.store') }}">
        @csrf
        @foreach ($productos as $producto)
            <div class="card1">

                <div class="image1">
                    <img src="https://cdn.pixabay.com/photo/2018/01/09/03/49/the-natural-scenery-3070808_1280.jpg">
                </div>
                <div class="title1">
                    <h1 class="leo">{{ $producto->nombre }}</h1>
                    <p class="card-text"> <b>Bs</b>{{ $producto->precio }}</p>
                </div>

                <div class="des1">

                    <p class="card-text"> <b>Cantidad :</b></p>
                    <input type="text" name="cantidad" style="width: 40%; margin-left: auto;
            margin-right: auto" class="focus border-primary  form-control" required>
                    <br>
                    <button class="btn btn-primary" type="submit">A??adir a Carrito</button>
                    <br>
                    <br>
                </div>
            </div>
        @endforeach
    </form> --}}

    <br>
    <br>

    <form action="{{ route('front.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1>Registrar Pedido</h1>
                </div>
                <div class="row" id="fila">
                    <div class="col-6">
                        <div id="map">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">

                            <div class="form-group col-md-6">
                                <input id="datetimepicker" type="text" name="Fecha_v" class="form-control"
                                    value="{{ old('Fecha_v') }}" autocomplete="off" id="Fecha_v" required>
                                <label for="Fecha_v">Ingrese la Fecha de Entrega</label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="latitud" id="latitud" readonly>
                                <label for="latitud">Latitud</label>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="longitud" id="longitud" readonly>
                                <label for="longitud">Longitud</label>
                            </div>
                        </div>
                            <div class="form-group col-md-3">
                                <button class="btn btn-primary" type="submit">Registrar Pedido</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </div>
    </form>
    <br>


    </div>
    {{-- <div class="main1" style="padding-left: 2rem">
        @foreach ($productos as $producto)
            <div class="card1">

                <div class="image1">
                    <img src="https://cdn.pixabay.com/photo/2018/01/09/03/49/the-natural-scenery-3070808_1280.jpg">
                </div>
                <div class="title1" style="display: flex; justify-content: center">
                    <input type="checkbox" style="padding-right: rem" value="{{ $producto->id }}" name="servicio[]"
                        class="form-check-input">
                    <h1 style="padding-left: 0.65rem" class="leo"> {{ $producto->nombre }}</h1>
                </div>
                @foreach ($modelos as $modelo)
                    @if ($producto->Id_modelo == $modelo->id)
                        <p class="card-text" style="display: flex; justify-content: center"> <b>Modelo
                                :</b>{{ $modelo->nombre }}</p>
                        @foreach ($marcas as $marca)
                            @if ($modelo->Id_marca == $marca->id)
                                <p class="card-text" style="display: flex; justify-content: center"> <b>Marca
                                        :</b>{{ $marca->nombre }}</p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @foreach ($categorias as $categoria)
                    @if ($producto->Id_categoria == $categoria->id)
                        <p class="card-text" style="display: flex; justify-content: center"> <b>Categoria
                                :</b>{{ $categoria->nombre }}</p>
                    @endif
                @endforeach
                <p class="card-text" style="display: flex; justify-content: center">
                    <b>Bs</b>{{ $producto->precio }}
                </p>
                <div class="des1">

                    <p class="card-text"> <b>Cantidad :</b></p>
                    <input type="text" name="cantidad" style="width: 40%; margin-left: auto;margin-right: auto"
                        class="focus border-primary  form-control" required>
                    
                        <br>
                    <button class="btn btn-primary" type="submit">A??adir a Carrito</button> EXRTRA 

                    <br>
                    <br>
                </div>
            </div>
        @endforeach
    </div> --}}
    
    {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($productos as $producto)
                <div class="col">
                <div class="card h-100">
                <img src="" class="card-img-top" width="200" height="300" alt="...">
                <div class="card-body">            
                    <h5 class="card-title"> <input type="checkbox" value="{{$servicios->id}}" name="servicio[]"class="form-check-input">{{$servicios->nombre}}</h5>
                    <p class="card-text">{{$producto->nombre}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Precio: {{$servicios->precio}} Bs.</small>
                </div>
                </div>
                </div>
            @endforeach
            </div> --}}


    {{-- </form> --}}

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
                        <p>Suscr??base a nuestro bolet??n y obtenga ofertas exclusivas que no encontrar?? en
                            ning??n
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
    <script src="{{ asset('js/app2.js') }}"></script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzFYkPY-6MF--52UAWVRVzhj4pV5MQCCY&callback=initMap">
    </script>
</body>

</html>
