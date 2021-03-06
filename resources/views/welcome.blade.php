<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/SmarHome.jpeg" type="image/x-icon">
    <link rel="shortcut icon" href="{ { asset('img/SmarHome.jpeg') } }" type="image/x-icon">
    <link rel="stylesheet" href="css/styleW.css?v=<?php echo time(); ?>" />
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <title>Smartplusshouse</title>


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}"> {{-- Y Estos dos son localmente --}}
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('css/owl.carousel.css') }}"> {{-- ESTOs DOS SON PARA LA NUBE --}}
    <link rel="stylesheet" href="{{ secure_asset('css/style2.css') }}">
    <link rel="stylesheet" href="css/responsive.css">

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
                            <li><a href="https://wa.me/message/P3Z4SEURODT2I1" target="_blank"><i
                                        class="fa fab fa-whatsapp"></i> Whatsapp</a></li>
                            {{-- <li><a href="#"><i class="fa fa-money"></i> Checkout</a></li> --}}
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa far fa-edit"></i> Registrarse</a>
                                </li>
                            @else
                                <li class="nav-item">

                                    <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i
                                            class="fa fa-power-off"></i>
                                        {{ __('Cerrar Sesi??n') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            @endif

                            {{-- <li class="hidden"><a href="#"><i class="fa fa-power-off"></i> Logout</a></li> --}}
                            <!--Solo se muestra cuando est??n logeados -->



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
                        <h1><a class="logoo"><img src="img/SmarHome.jpeg" class="logu"
                                    alt="Logo">Smartplusshouse</a></h1>
                        <h1><a href="#"></a></h1>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('homex.index') }}">Inicio</a></li>
                        @can('Session')
                            <li><a href="{{ route('front.create') }}">Productos</a></li>
                            <li><a href="{{ route('payment.create') }}">Servicio</a></li>

                            <li><a href="{{ route('payment.index') }}">Facturas</a></li>
                        @endcan
                        <li><a href="{{ route('front.index') }}">Nuestra Empresa</a></li>
                        <li class="hidden"><a href="#">Dashboard</a></li><!-- Acceso autorizado -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!---End mainmenu area -->

    {{-- <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> --}}
    <!--
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are awesome</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, dolorem, excepturi. Dolore aliquam quibusdam ut quae iure vero exercitationem ratione!</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ab molestiae minus reiciendis! Pariatur ab rerum, sapiente ex nostrum laudantium.</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are great</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, dolorum harum molestias tempora deserunt voluptas possimus quos eveniet, vitae voluptatem accusantium atque deleniti inventore. Enim quam placeat expedita! Quibusdam!</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are superb</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eius?</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptates necessitatibus dicta recusandae quae amet nobis sapiente explicabo voluptatibus rerum nihil quas saepe, tempore error odio quam obcaecati suscipit sequi.</p>
                                                <a href="#" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> 
 End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>Atenci??n 24hrs</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Env??o gratis</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Pagos Seguros</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>Productos Nuevos</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title"> <b>??ltimos Productos</b> </h2>
                        <div class="product-carousel">
                            @foreach ($producto as $productos)



                                <div class="single-product">
                                    <div class="product-f-image">
                                        {{-- <img src="{{ asset('img/product-1.jpg') }}" alt=""> --}}
                                        <img src="{{ $productos->url }}" alt="">
                                    </div>
                                    <h2>{{ $productos->nombre }}</h2>
                                    <div class="product-carousel-price">

                                        <ins>{{ $productos->precio - ($productos->precio * $productos->descuento) / 100 }}Bs</ins>
                                        @if ($productos->descuento > 0)
                                            <del>{{ $productos->precio }}Bs</del>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                            {{-- <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ asset('img/product-2.jpg') }}" alt="">

                                </div>

                                <h2>Producto 4</h2>
                                <div class="product-carousel-price">
                                    <ins>$899.00</ins> <del>$999.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ asset('img/product-3.jpg') }}" alt="">

                                </div>

                                <h2>Producto 3</h2>

                                <div class="product-carousel-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ asset('img/product-4.jpg') }}" alt="">

                                </div>

                                <h2>Producto 3 microsoft</h2>

                                <div class="product-carousel-price">
                                    <ins>$200.00</ins> <del>$225.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ asset('img/product-5.jpg') }}" alt="">

                                </div>

                                <h2>Producto 2</h2>

                                <div class="product-carousel-price">
                                    <ins>$1200.00</ins> <del>$1355.00</del>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <div class="product-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title"><b>Las m??s vendidas</b> </h2>
                        {{-- <a href="" class="wid-view-more">ver todo</a> --}}
                        @foreach ($producto as $productos)
                            @if ($productos->stock < 10)

                                <div class="single-wid-product">
                                    <a><img src="{{ $productos->url }}" alt="" class="product-thumb"></a>
                                    <h2>{{ $productos->nombre }}</h2>
                                    <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-wid-price">

                                        <ins>{{ $productos->precio - ($productos->precio * $productos->descuento) / 100 }}Bs</ins>
                                        @if ($productos->descuento > 0)
                                            <del>{{ $productos->precio }}Bs</del>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title"><b>Ofertas Top</b> </h2>
                        {{-- <a href="#" class="wid-view-more">Ver todo</a> --}}
                        @foreach ($producto as $productos)
                            @if ($productos->descuento > 0)

                                <div class="single-wid-product">
                                    <img src="{{ $productos->url }}" alt="" class="product-thumb">
                                    <h2>{{ $productos->nombre }}</h2>
                                    <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-wid-price">
                                        <ins>{{ $productos->precio - ($productos->precio * $productos->descuento) / 100 }}Bs</ins>
                                        <del>{{ $productos->precio }}Bs</del>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title"><b>Servicios Top</b></h2>
                        {{-- <a href="#" class="wid-view-more">Ver Todo</a> --}}
                        @foreach ($servicio as $servicios)


                            <div class="single-wid-product">
                                <img src="{{ $servicios->url }}" alt="" class="product-thumb">
                                @foreach ($tservicio as $tservicios)
                                    @if ($servicios->Id_tp == $tservicios->id)
                                        <h2>{{ $tservicios->nombre }}</h2>
                                    @endif
                                @endforeach
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>{{ $servicios->precio }}Bs</ins>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
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
                        <p>Suscr??base a nuestro bolet??n y obtenga ofertas exclusivas que no encontrar?? en ning??n
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
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
</body>

</html>
