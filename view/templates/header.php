<!DOCTYPE html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<header>   
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link" href="index.php"
                aria-current="page">Inicio<span 
                class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link" href="cars.php"
                aria-current="page">Coches<span
                class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link" href="vans.php">Furgonetas</a>
            </li>
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link" href="motorbikes.php">Motos</a>
            </li>
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link" href="register.php">Registrarse</a>
            </li>
        </ul>
    </nav>
                <?php require("../controller/loginController.php"); ?>
  </header>
