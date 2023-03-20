<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/presently/styles/index.css">
    <link rel="stylesheet" href="/presently/styles/layouts/login.css">
    <link rel="stylesheet" href="/presently/styles/buttons/large.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/992/992531.png">
    <title>Presently: Login</title>
</head>
<body>
<div id="app">
    <div id="container">
        <header>
            <h1>Login</h1>
        </header>
        <form id="form">
            <label>
                Correo
                <input placeholder="Ingresa tu correo" type="email" id="email"/>
            </label>
            <label>
                Contraseña
                <input placeholder="Ingresa tu contraseña" type="password" id="password"/>
            </label>
            <button class='large-button--light' id='action' type='button'>
                Ingresar
            </button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="/presently/scripts/login/onLogin.js"></script>
</body>
</html>