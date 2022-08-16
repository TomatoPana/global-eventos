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
</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
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
    </nav>
    <div class="container">
        <div class="row py-2">
            <h1 class="text-center">Bienvenido al Global de Eventos!</h1>
        </div>
        <div class="row">
            <div class="input-group input-group-lg">
                <input id="text-search" type="text" class="form-control" placeholder="Busca algo!" aria-label="Busca algo!"
                    aria-describedby="button-search">
                <button class="btn btn-outline-secondary" type="button" id="button-search">Vamos!</button>
            </div>
        </div>

        <div class="row pt-4">
            <h2 class="text-center"><i>🌟Hashtags encontrados🌟</i></h2>
        </div>

    </div>
    <div class="container text-center">

        @if($hashtags->count() === 0)
            <div class="row">
                <h3 class="text-center">😔 No se encontraron hashtags 😔</h3>
            </div>
        @else
            <div class="pt-2 d-flex justify-content-around flex-wrap-reverse">
                <!-- Este contenido saldra de la base de datos -->
                @foreach ($hashtags as $hashtag)
                    <button type="button" class="btn btn-outline-success">{{ $hashtag->hashtag }}</button>
                @endforeach
            </div>
        @endif

    </div>

    <div class="container pt-4">
        <div class="row">
            <h2 class="text-center"><i>💥Posts Encontrados💥</i></h2>
        </div>

        @if ($posts->count() === 0)
            <div class="row">
                <h3 class="text-center">😭 No hay posts disponibles 😭</h3>
            </div>
        @else

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="/storage/thumb-1920-941898.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {{ $post->description }}
                                </p>
                                <a href="/posts/{{ $post->id }}" class="btn btn-primary">Seguir Leyendo ➡️</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
    </div>

    <div class="position-fixed bottom-0 end-0 p-3">
        <a class="btn btn-success" href="/posts/create" role="button">Crear Post 🪄</a>
    </div>

    <div class="position-fixed bottom-0 start-0 p-3">
        <a class="btn btn-secondary" href="/" role="button">Ir al home! 🏠</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script src="/js/home.js"></script>
</body>

</html>
