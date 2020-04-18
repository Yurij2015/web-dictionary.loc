<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        }
        else {
            echo "Справочник \"Обработка текстовой информации\"";
        }
        ?>
        </title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">
    <script src="../lib/tinymce/js/tinymce/tinymce.js" referrerpolicy="origin"></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script>
        tinymce.init({
            selector: '#content',
            plugins: "print",
            // toolbar: "print",
            language: 'ru',
            height : "480",
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LearnSystem</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Авторизация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../edu-material.php">Учебные материалы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../category.php">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../edu-material.php">Личный кабинет</a>
            </li>
        </ul>
    </div>
</nav>
<hr>