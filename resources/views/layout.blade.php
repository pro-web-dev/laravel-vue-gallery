<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel-gallery</title>
    <link rel="stylesheet" href="/libs/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="d-flex flex-column h-100">

<main class="gallery" id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            {{--<a class="navbar-brand" href="#">Navbar</a>--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            Home <i class="fa fa-home"></i>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'createGallery'}" class="nav-link">
                            Add Image <i class="fa fa-image"></i>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</main>


<footer class="bg-dark text-center text-white-50 p-3 mt-auto">Author Sarvar)</footer>

<script src="/js/app.js"></script>
</body>
</html>
