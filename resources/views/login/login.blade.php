<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Amplifica</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <style>
            body {
                background-color: #49ADBA;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }

            .login-container {
                background: #fff;
                padding: 70px 40px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
                width: 100%;
                max-width: 450px;
                text-align: center;
            }

            .login-container h2 {
                margin-bottom: 20px;
                font-size: 28px;
            }

            .form-group {
                margin-bottom: 20px;
                text-align: left;
            }

            .form-group label {
                font-weight: 600;
            }

            .btn-login {
                background-color: #F7778A;
                color: white;
                border: none;
                width: 100%;
                padding: 10px;
                font-size: 18px;
                border-radius: 5px;
                margin-top: 10px;
                cursor: pointer;
            }

            .social-login {
                display: flex;
                justify-content: center;
                gap: 15px;
                margin-top: 20px;
            }

            .social-login a img {
                width: 40px;
                height: 40px;
                cursor: pointer;
                transition: transform 0.3s;
            }

            .social-login a img:hover {
                transform: scale(1.1);
            }

            .extra-links {
                margin-top: 20px;
                font-size: 14px;
            }

            .extra-links a {
                display: block;
                color: #60aacb;
                text-decoration: none;
                margin-top: 10px;
            }

            .extra-links a:hover {
                text-decoration: underline;
            }

            .brand{ display:flex; align-items:center; gap:10px; justify-content:center; color:#0e5962; margin-bottom:4px; }
            .brand i{ color:var(--brand); font-size:28px; }
            .brand h2{ margin:0; font-weight:800; letter-spacing:.5px; }

            /* RESPONSIVE */
            @media (max-width: 500px) {
                .login-container {
                    max-width: 90%;
                    padding: 20px 15px;
                }

                .login-container h2 {
                    font-size: 22px;
                }

                .btn-login {
                    font-size: 16px;
                    padding: 12px;
                }

                .social-login a img {
                    width: 32px;
                    height: 32px;
                }
            }
        </style>


    </head>
    <body>

    <div class="login-container">
        <div class="brand">
            <i class="fa-solid fa-lock"></i>
            <h2>AMPLIFICA</h2>
        </div>

        <h4>BIENVENIDO</h4>

        <form action="{{route("valida_login")}}" method="POST">
            @csrf <!-- Importante si es Laravel -->

            <div class="form-group">
                <label for="usuario">Correo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="text" id="correo" name="correo" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                @if(session('error_login'))
                    <div class="alert alert-danger" style="font-size: 14px; text-align: center;">
                        {{ session('error_login') }}
                    </div>
                @endif
            </div>

            @if (session('ok'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('ok') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            <button type="submit" class="btn-login">Ingresar</button>

        </form>

    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>
