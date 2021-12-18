<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Smartplusshouse</title>

    <link rel="shortcut icon" href="img/SmarHome.jpeg" type="image/x-icon">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
</head>

<body>

    {{-- <div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST"class="sign-in-form" action="{{ route('login') }}">"
                <h2 class="tittle-sign">Iniciar Sesión</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <p class="social-text">ó Iniciar Sesion con una red social</p>
                <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>

                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
            </div>
            </form>
        </div>
    </div>
    <div class="panels-container"></div>
</div> --}}
    <div class="container">
        <img class="fondoo" src="img/FodoSecurity.png" alt="Fondo">
        <div class="forms-container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title">
                        <img src="img/SmarHome.jpeg" class="logoto" alt="Logos">Smartplusshouse
                    </div>
                    @error('email')
                        <div class="palerta">
                            <strong>El correo electrónico que has introducido o contraseña son incorrectos.</strong>
                        </div>
                    @enderror
                    @error('password')
                        <div class="palerta">
                            <strong>El correo electrónico que has introducido o contraseña son incorrectos.</strong>
                        </div>
                    @enderror

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2 class="tittle-sign">Iniciar Sesión</h2>
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label> --}}
                            <div class="form-group row">
                                <i class="fas fa-user"></i>



                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Correo Electrónico">



                            </div>
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label> --}}
                            <div class="form-group row">
                                <i class="fas fa-lock"></i>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Contraseña">



                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="recordame" for="remember">
                                    {{ __('Recuérdame') }}
                                </label>
                                {{-- <div class="olvidaste">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('¿Has olvidado la contraseña?') }}
                                                    </a>
                                                @endif
                                        </div> --}}
                            </div>
                            <div class="loginboton">
                                <button type="submit" class="botonaso">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                            <div class="form-xddd">


                                {{-- <p class="social-text" style="text-align: center">ó Iniciar Sesion con una red social</p>  
                                
                <div class="social-media">
                    
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>

                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
            </div> --}}

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
