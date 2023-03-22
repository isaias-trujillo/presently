<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/presently/css/index.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/layouts/platform.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/table/layout.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/table/options.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/table/search.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/buttons/large.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/buttons/medium.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/buttons/small.css">
    <link rel="stylesheet" type="text/css" href="/presently/css/pages/layout.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/992/992531.png">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,200,0,0"/>
    <title>Students</title>
</head>
<body>
<div id="app">
    <div id="platform">
        <nav id="navbar">
            <header>
                <span>Robert Thomas</span>
                <br>
                <span>Admin</span>
            </header>
            <ul>
                <li class="active">
                    Students
                </li>
            </ul>
            <button class='large-button--dark' id='action' type='button' onclick="onLogout()">
                Logout
            </button>
        </nav>
        <section id="content">
            <div id="options">
                <h1>Students</h1>
                <label id="search">
                    <span class="material-symbols-outlined">search</span>
                    <input type="search" placeholder="Buscar">
                </label>
                <button class="medium-bottom--dark" type="button">
                    <span class="material-symbols-outlined">add</span>
                    Nuevo registro
                </button>
            </div>
            <span>Registros: 14</span>
            <table id="records">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                </tbody>
            </table>
            <div id="pagination">
                <button class="small-button--light" id="left">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <span id="page">Page: 1 / 1</span>
                <button class="small-button--light" id="right">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </section>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="/presently/backend/shared/onLogout.js"></script>
<script src="/presently/backend/shared/redirectIfLogged.js"></script>
</body>
</html>