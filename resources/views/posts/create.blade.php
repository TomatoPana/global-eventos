<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('c65bb16b19878dade050', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/storage/Ceti.webp" alt="" width="30" height="30">
                CETI - IDS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Amigos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row py-2">
            <h1 class="text-center">Crear Post</h1>
        </div>

        <div class="row py-2">
            <div class="input-group input-group-lg">
                <input name="title" type="text" class="form-control" placeholder="Ingresa el titulo de tu creacion"
                    aria-label="Ingresa el titulo de tu creacion!" aria-describedby="button-addon2">
            </div>
        </div>

        <div class="row py-2">
            <h1 class="text-center">Cuentanos un poco acerca de tu post uwu</h1>
        </div>

        <div class="row py-2">
            <div class="input-group input-group-lg">
                <input name="description" type="text" class="form-control" placeholder="Una descripcion bien pro!"
                    aria-label="Una descripcion bien pro!" aria-describedby="button-addon2">
            </div>
        </div>

        <div class="row pt-4">
            <h2 class="text-center"><i>🌟Algunos hashtags? 7u7🌟</i></h2>
        </div>

        <div class="row py-2">
            <div class="input-group input-group-lg">
                <input name="hashtags" type="text" class="form-control" placeholder="Coloca tus hashtags!!! ❤️❤️❤️"
                    aria-label="Coloca tus hashtags!!! ❤️❤️❤️" aria-describedby="button-addon2">
            </div>
        </div>

        <div class="row pt-4">
            <h2 class="text-center">🌈 Adelante, crea algo magico 🌈</h2>
        </div>

    </div>

    <div class="container">
        <div id="editor"></div>
    </div>

    <div class="position-fixed bottom-0 start-0 p-3">
        <a class="btn btn-secondary" href="/" role="button">Ir al home! 🏠</a>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3">
        <button class="btn btn-success" id="btn-post-create">Guardar Creacion! 🪄</button>
        @csrf
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Publicacion hecha!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Tu publicacion se ha hecha y se te llevara a ella en unos segundos!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="/js/post.create.js"></script>
</body>

</html>
