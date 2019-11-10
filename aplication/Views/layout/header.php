<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Главная | WebbyLab</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/javascript/scripts.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-light" href="/">WebbyLab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/create">Добавить фильм</a>
            </li>
        </ul>
        <?php if(array_keys($_GET)[0] != 'create') { ?>
        <form class="form-inline mr-1 my-2 my-lg-0" id="search-form" action="/searchTitle" method="POST">
            <input class="form-control mr-sm-2" id="search" type="text" name="searchTitle" placeholder="Поиск по названию" aria-label="Поиск по названию">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>

        <form class="form-inline my-2 my-lg-0" id="search-form" action="/searchStars" method="POST">
            <input class="form-control mr-sm-2" id="search" type="text" name="searchStars" placeholder="Поиск по актеру" aria-label="Поиск по актеру">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
        <?php }?>
    </div>
</nav>