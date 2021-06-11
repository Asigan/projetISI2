<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('/css/echecs.css')}}">
        <link rel="stylesheet" href="{{asset('lib/bootstrap/bootstrap.min.css')}}">

        <title>
            @yield('titrePage')
        </title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/echecs')}}">Les echecs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('joueurs')}}">Les joueurs</a></li>
                                <li><a class="dropdown-item" href="{{url('tournois')}}">Les tournois</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header>
            @yield('titreItem')
        </header>
        @yield('contenu')
        <footer class="footer">
            Les echecs - Guy Titouan / Michallet Anthony - 2021
        </footer>
        <script type='text/javascript' src="{{asset('/lib/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>