<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartplusshouse</title>
    <link rel="shortcut icon" href="img/SmarHome.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="css/styleW.css?v=<?php echo time(); ?>" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>



    <section>
        <div class="circle"></div>
        <header>
            <a href="#" class="logo"><img src="img/SmarHome.jpeg" class="logu" alt="Logo"></a>
            <ul>
                {{-- <li><a class="titu" href="{{ route('login') }}">Iniciar Sesion</a></li>
                <li><a class="titu" href="{{ route('register') }}">Registrarse</a></li> --}}
                <li><a class="titu" href="{{route('homex.index')}}">Volver</a></li>
                
            </ul>
        </header>
        <div class="content">

            <div class="textBox">
                <h2>Esto no es solo <b>Seguridad</b><br>Esto es <span>Smartplusshouse</span></h2>
                <p>SISTEMA DE INFOMACION PARA ADMINISTRAR COMPRA Y VENTA DE ACCESORIOS DE SEGURIDAD WEB,SIP(CAMARAS,
                    VIDEOPORTEROS, INTERCOMUNICADORES, ALARMAS, ETC).</p>

            </div>
            <div class="imgBox">
                <img src="img/img1.png" class="CasaXd" id="small">
            </div>
        </div>
        <ul class="thumb">
            <li><img class="small" src="img/CasaXd.png"
                    onclick="imgSlider('img/CasaXd.png');changeCircleColor('#0059a1')"></li>
            <li><img class="small" src="img/CandadoXd1.png"
                    onclick="imgSlider('img/CandadoXd1.png');changeCircleColor('rgb(66,146,11)')"></li>
            <li><img class="small" src="img/CamaraXd2.png"
                    onclick="imgSlider('img/CamaraXd2.png');changeCircleColor('#eb741e')"></li>
        </ul>
        <ul class="sci">

            {{-- <li><a href=""><img src="img/twitter.png" alt=""></a></li> --}}
            {{-- <li><a href=""><img src="img/instagram.png" alt=""></a></li> --}}
            <li><a class="Gitt" href="https://github.com/LeoMogiano/Proyecto-SI1"><img src="img/Gitt.png"
                        alt=""></a></li>

        </ul>
    </section>
    <script type="text/javascript">
        function imgSlider(anything) {
            document.querySelector('.CasaXd').src = anything;
        }

        function changeCircleColor(color) {
            const circle = document.querySelector('.circle');
            circle.style.background = color;
        }
    </script>
</body>

</html>
