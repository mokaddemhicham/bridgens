<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bridge ENS')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.admin.css') }}">
</head>
<body>
    <div class="overlay-sm"></div>
    {{-- Start Slidebar --}}
    <aside class="slidebar">
        <div class="slidebar-brand">
            <div class="logo">
				<a href="{{ route('dashboard') }}"><img src="{{ asset('uploads/images/logo_dashbord.png') }}" alt="logo" class="img-fluid"></a>
			</div>
        </div>
        <div class="slidebar-menu">
            <ul>
                <li class="{{Route::currentRouteNamed('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i><span>Tableau de bord</span></a></li>
                <li class="{{ Route::currentRouteNamed('admin.courses') ? 'active' : '' }}"><a href="{{ route('admin.courses') }}"><i class="fas fa-graduation-cap"></i><span>Mes Cours</span></a></li>
                <li class="{{ Route::currentRouteNamed('admin.events') ? 'active' : '' }}"><a href="{{ route('admin.events') }}"><i class="far fa-calendar-alt"></i><span>Evénements</span></a></li>
                <li class="{{ Route::currentRouteNamed('admin.formations') ? 'active' : '' }}"><a href="{{ route('admin.formations') }}"><i class="fas fa-chalkboard-teacher"></i><span>Formations</span></a></li>
                <li class="{{ Route::currentRouteNamed('admin.team') ? 'active' : '' }}"><a href="{{ route('admin.team') }}"><i class="fas fa-users"></i><span>Membres</span></a></li>
                <li class="{{ Route::currentRouteNamed('admin.partners') ? 'active' : '' }}"><a href="{{ route('admin.partners') }}"><i class="far fa-handshake"></i><span>Partenaires</span></a></li>
            </ul>
        </div>
    </aside>
    {{-- End Slidebar  --}}
    <main>
		{{-- Start Navigation Bar --}}
		<header>
			<nav>
                <div class="top-navbar">
                    <div class="toggle-menu">
                        <i class="fas fa-bars"></i>
                        <span>Tableau de bord</span>
                    </div>
                    <a href="#" class="admin-profile">
                        <div class="admin-image">
                            <img src="{{ asset('uploads/images/' . Auth::user()->profile_photo_path) }}" alt="admin">
                        </div>
                        <div class="admin-info">
                            <h4>{{ Auth::user()->name[0] }}. {{ Str::of(Auth::user()->name)->after(' ') }}</h4>
                            <p>Administrateur</p>
                        </div>
                    </a>
                    
                    <div uk-drop="mode: click" class="dropdown">
                        <ul>
                            <li>Compte</li>
                            <li><a href="{{ route('admin.profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>

                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>

                <div aria-label="breadcrumb" id="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('current-page', 'Tableau de bord')</li>
                    </ol>
                </div>
				
                
			</nav>
		</header>
		{{-- End Navigation Bar --}}
        
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js" integrity="sha256-BDmtN+79VRrkfamzD16UnAoJP8zMitAz093tvZATdiE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/3.0.0/jquery.waypoints.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.admin.js') }}"></script>
</body>
</html>