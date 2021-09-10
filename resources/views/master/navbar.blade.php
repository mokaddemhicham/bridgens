<header class="header">
    <div class="container">
        <div class="nav-bar">
            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('uploads/images/logo.png') }}" alt="logo" class="img-fluid"></a></div>
            <ul>
                <li><a href="{{ url('/') }}" class="{{Route::currentRouteNamed('/') ? 'active-link' : '' }}">Accueil</a></li>
                <li><a href="{{ route('events') }}" class="{{Route::currentRouteNamed('events') ? 'active-link' : '' }}">Evénements</a></li>
                <li><a href="{{ route('formations') }}" class="{{Route::currentRouteNamed('formations') ? 'active-link' : '' }}">Formations</a></li>
                <li><a href="{{ route('courses') }}" class="{{Route::currentRouteNamed('courses') ? 'active-link' : '' }}">Mes Cours</a></li>
                <li><a href="{{ route('team') }}" class="{{Route::currentRouteNamed('team') ? 'active-link' : '' }}">Membres</a></li>
                <li><a href="{{ route('about') }}" class="{{Route::currentRouteNamed('about') ? 'active-link' : '' }}">À propos de nous</a></li>
            </ul>
            <div class="right-nav">
                <div class="contact-us"><a href="{{ route('contact') }}">Contacter Nous</a></div>
                <div class="Hamburger_button">
                    <span id="s1"></span>
                    <span id="s2"></span>
                    <span id="s3"></span>
                </div>
            </div>
        </div>
    </div>
</header>