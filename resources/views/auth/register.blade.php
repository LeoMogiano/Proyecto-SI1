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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <img class="fondoo" src="img/FodoSecurity.png" alt="Fondo">
        <div class="forms-container">
            <div class="card">

                <div class="card-title">
                    <img src="img/SmarHome.jpeg" class="logoto" alt="Logos">Smartplusshouse
                </div>
                @error('password')
                    <div class="palerta">
                        <strong>Se necesitan 8 caracteres como mínimo para la contraseña.</strong>
                    </div>
                @enderror
                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2 class="tittle-sign">Registrate</h2>
                        <div class="form-group row">


                            <i class="fas fa-address-card"></i>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Nombre">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group row">
                            <i class="fas fa-user"></i>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Correo Electrónico">

                            @error('email')
                                <div class="palerta">
                                    <strong>El correo electrónico que has introducido o contraseña son incorrectos.</strong>
                                </div>
                            @enderror

                        </div>


                        <div class="form-group row">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Contraseña">



                        </div>

                        <div class="form-group row">

                            <i class="fas fa-lock"></i>

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmar Contraseña">

                        </div>

                        <div class="loginboton">

                            <button type="submit" class="botonaso">
                                {{ __('Registrarse') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="app.js"></script>
</body>

</html>
