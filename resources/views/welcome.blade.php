@extends('master.layout')
@section('title')
    Bridge'ENS
@endsection
@section('content')
    @include('master.navbar')
        <div class="content-header">
            <div class="container">
                <div class="content row">
                    <div class="left-content col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".5s">
                        <h1>Bridge'<span>ENS</span>, challenge your self and find <span>The Way</span> to the <span>Next Level</span>.</h1>
                        <p>Le club des « Bridge'ENS » exploitera les connaissances des différents étudiants de notre école, notamment les anciens étudiants qui offriront une formation dans les différents langages ou logiciels ainsi que les concepts informatique.</p>
                        <a href="{{ route('about') }}">Lire la suite</a>
                    </div>
                    <div class="right-content col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay=".5s">
                        <img src="{{ asset('uploads/images/Programming-pana.svg') }}" alt="vector" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <!-- start section services -->
        <section id="services">
            <div class="container">
                <div class="section-title row">
                    <h3 class="col-12">Nos Services</h3>
                    <h1 class="col-12">Comment ça marche?</h1>
                    <p class="col-12">le club propose plusieurs services parmi eux, il encadre des événements, des formations, des cours.</p>
                </div>
                <div class="services row">
                    <div class="col-lg-4 col-md-6 mb40 wow fadeInUp" data-wow-delay="0s">
                        <div class="service">
                            <i class="far fa-calendar-alt service-icon"></i>
                            <h3 class="service-name">Evénements</h3>
                            <p class="service-description">Le club Bridge'ENS chapeaute plusieurs événements organisés au sein de L'ENS dans le cadre de développement durable pour objectif de sensibiliser tous les étudiants à la participation et l'intégration dans la vie culturelle et pouvoir construire une personnalité sociale et responsable.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb40 wow fadeInUp" data-wow-delay=".25s">
                        <div class="service">
                            <i class="fas fa-chalkboard-teacher service-icon"></i>
                            <h3 class="service-name">Formations</h3>
                            <p class="service-description">Dans le cadre du développement durable adopté par notre pays. Le club Bridge'ENS assure des formations visant à sensibiliser l'ensemble des lauréats de L'ENS en tant que futurs professeurs pour faciliter et numériser l'opération d'enseignement.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb40 wow fadeInUp" data-wow-delay=".5s">
                        <div class="service">
                            <i class="fas fa-graduation-cap service-icon"></i>
                            <h3 class="service-name">Cours</h3>
                            <p class="service-description">Les cours et le domaine de recherche du Pr.LAANAOUI.<br>
                                Les cours assurés au sein du département informatique et les différents départements auxquels il intervient. Ainsi que les centres d'intérêt de recherche scientifique et la démarche participative qu'il adopte dans le cadre de partenariat entreprise université.</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn-custom">Lire la suite</a>
            </div>
        </section>
        <section id="events">
            <div class="container">
                <div class="section-title row">
                    <h3 class="col-12">Nos Evénements</h3>
                    <h1 class="col-12">Comment ça marche?</h1>
                    <p class="col-12">Le club Bridge'ENS chapeaute plusieurs événements organisés au sein de L'ENS dans le cadre de développement durable.</p>
                </div>
                <div class="events">
                    @if ($lastEvent)
                        <a href="{{ route('event', $lastEvent->slug) }}" class="current-event wow fadeInLeft" data-wow-delay="0s">
                            <img src="{{ asset('uploads/events/'. $lastEvent->affiche ) }}" alt="Event">
                            <div class="event-info">
                                <div class="inner">
                                    <span class="event-date"><i class="far fa-calendar-alt"></i> {{ date('d / m / Y', strtotime($lastEvent->date)) }}</span>
                                    <span class="event-time"><i class="far fa-clock"></i> {{ $lastEvent->heure }}</span>
                                </div>
                            </div>
                        </a>
                    @endif
                    <div class="slide-events wow fadeInRight" data-wow-delay="0s">
                        @foreach ($events as $event)
                            <a class="event" href="{{ route('event', $event->slug) }}">
                                <div class="overlay"></div>
                                <img src="{{ asset('uploads/events/'. $event->affiche ) }}" alt="Event">
                                <div class="event-info">
                                    <div class="inner">
                                        <span class="event-date"><i class="far fa-calendar-alt"></i> {{ date('d / m / Y', strtotime($event->date)) }}</span>
                                        <span class="event-time"><i class="far fa-clock"></i> {{ $event->heure }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="goals">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mt-4 mb-4 wow fadeInRight" data-wow-delay="0s">
                        <h2>
                            Ojectif du Club<br>
                            Bridge'<span class="id-color">ENS</span>
                        </h2>
                        <p>
                            Hisser le niveau scientifique des étudiants dans le domaine informatique,
                            Familiariser les étudiants à l’environnement informatique,
                            Organiser des compétitions informatique en groupes,
                            Représenter l’Université dans les différentes manifestations informatique.
                        </p>
                        <a class="btn-custom" href="{{ route('about') }}">Lire la suite</a>
                    </div>
                    <div class="col-lg-5 offset-lg-1 wow fadeInLeft" data-wow-delay="0s">
                        <img src="{{ asset('uploads/images/Team goals-pana.svg') }}" alt="goal" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section id="formations">
            <div class="container">
                <div class="section-title row">
                    <h3 class="col-12">Nos Formations</h3>
                    <h1 class="col-12">Comment ça marche?</h1>
                    <p class="col-12">Le club Bridge'ENS assure des formations visant à sensibiliser l'ensemble des lauréats de L'ENS en tant que futurs professeurs pour faciliter et numériser l'opération d'enseignement.</p>
                </div>
                <div class="events wow fadeInUp" data-wow-delay="0s">
                    <div class="slide-events">
                        @foreach ($formations as $formation)
                            <a class="event" href="{{ route('formation', $formation->slug) }}">
                                <div class="overlay"></div>
                                <img src="{{ asset('uploads/formations/'. $formation->formation ) }}" alt="Event">
                                <div class="event-info">
                                    <div class="inner">
                                        <span class="event-date"><i class="far fa-calendar-alt"></i> {{ date('d / m / Y', strtotime($formation->date)) }}</span>
                                        <span class="event-time"><i class="far fa-clock"></i> {{ $formation->heure }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <section id="partenariat">
            <div class="container">
                <div class="partenaires row">
                    <div class="title col-md-2 d-flex align-items-center">
                        <h5>Nos Partenaires</h5>
                    </div>
                    <div class="partenaires-logo col-md-10 wow fadeInUp" data-wow-delay="0s">
                        @foreach ($partners as $partner)
                            <a href="{{ $partner->website }}" class="item d-flex justify-content-center" target="_blank"><img src="{{ asset('uploads/partners/'. $partner->logo) }}" alt="{{ $partner->nom }}"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="counting">
            <div class="container">
                <div class="row">
                    <div class="col wow fadeInUp" data-wow-delay="0s">
                        <h3 class="timer">{{ count($eventsTotal) }}</h3>
                        <span>Evénements</span>
                    </div>
                    <div class="col wow fadeInUp" data-wow-delay="0.25s">
                        <h3 class="timer">{{ count($formationsTotal) }}</h3>
                        <span>Formations</span>
                    </div>
                    <div class="col wow fadeInUp" data-wow-delay="0.5s">
                        <h3 class="timer">{{ count($coursesTotal) }}</h3>
                        <span>Cours</span>
                    </div>
                    <div class="col wow fadeInUp" data-wow-delay="0.75s">
                        <h3 class="timer">{{ count($membresTotal) }}</h3>
                        <span>Membres</span>
                    </div>
                </div>
            </div>
        </section>
    @include('master.footer')
@endsection