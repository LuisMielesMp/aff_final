<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://salesystems.es/wp-content/uploads/2023/01/tecnologia-informatica-diferencias.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(7px);
            z-index: -1;
        }
        .login-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .login-card h2 {
            color: #333333;
        }
        .form-control-placeholder {
            position: absolute;
            top: 15px;
            left: 20px;
            transition: all 0.3s ease;
            pointer-events: none;
            font-weight: 300;
        }
        .form-control:focus + .form-control-placeholder,
        .form-control:not(:placeholder-shown) + .form-control-placeholder {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: #3498db;
            font-weight: 700;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .social-icon {
            font-size: 24px;
            color: #333333;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .social-icon:hover {
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="background-container"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="login-card">
                    <h2 class="text-center mb-4">Iniciar Sesión</h2>
					<form class="signin-form" action="https://localhost/ci4/testbd" method="post">

                        <div class="form-group position-relative">
                            <input type="text" class="form-control" required>
                            <label class="form-control-placeholder" for="username">Nombre de Usuario</label>
                        </div>
                        <div class="form-group position-relative">
                            <input id="password-field" type="password" class="form-control" required>
                            <label class="form-control-placeholder" for="password">Contraseña</label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-block py-2">Iniciar Sesión</button>
							

                        </div>
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <label class="checkbox-wrap checkbox-primary mb-0">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                Recordarme
                            </label>
                            <a href="#" class="text-muted">¿Olvidaste tu Contraseña?</a>
                        </div>
                        <p class="text-center mb-0">¿No eres miembro? <a href="#" class="text-primary">Regístrate</a></p>
                    </form>
                    <div class="social-icons text-center mt-4">
                        <a href="#" class="social-icon"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="social-icon"><span class="fa fa-twitter"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>
</html>

