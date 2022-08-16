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
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
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
        <div class="row">
            <div class="col-sm-12 col-md-4 border-end border-dark border-2 pt-5">
                <h4>Autor</h4>
                {{ $post->author->fullname }}
                <hr>
                <h4>Creado el:</h4>
                {{ $post->created_at }}
                <hr>
                <h4>Actualizado el:</h4>
                {{ $post->updated_at }}
                <hr>
                <h4>Likes</h4>
                <button type="button" class="btn btn-outline-secondary position-relative">
                    Me gusta ❤️
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      {{ $post->likes }}
                      <span class="visually-hidden">likes</span>
                    </span>
                  </button>
                @if($post->author->id == Auth::user()->id)
                    <hr>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a role="button" href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Editar</a>
                        <button id="delete_post" class="btn btn-danger">Eliminar</button>
                    </div>
                    <p class="text-muted"><i>Solo tu puedes ver los controles 👀</i></p>
                @endif
            </div>
            <div class="col-sm-12 col-md-8">
                <h1>{{ $post->title }}</h1>
                <h3><i>{{ $post->description }}</i></h3>
                <br>
                <p>{!! Str::markdown($post->body) !!}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script>

        const delete_post = document.getElementById('delete_post');
        delete_post.addEventListener('click', function(e) {
            e.preventDefault();
            const csrfToken = document.querySelector('input[name=_token]').value;
            const formData = new FormData();
            formData.append('_token', csrfToken);

            if(confirm('¿Estas seguro de eliminar este post?')) {
                fetch('/posts/' + window.post.id, {
                    method: 'DELETE',
                    body:
                }).then(function (response) {
                    if (response.ok) {
                        response.json().then(function (data) {
                            const toastTrigger = document.getElementById('liveToastBtn')
                            const toastLiveExample = document.getElementById('liveToast')
                            if (toastTrigger) {
                                toastTrigger.addEventListener('click', () => {
                                    const toast = new bootstrap.Toast(toastLiveExample)
                                    toast.show()
                                    window.location.href = '/';
                                })
                            }
                        });
                    }
                }).catch(function (error) {
                    console.error(error);
                });

            }
        });

    </script>
</body>

</html>
