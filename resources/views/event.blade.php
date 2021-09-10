@extends('master.layout')
@section('title')
    {{ $event->theme }}
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader" class="single-event">
        </section>
        <main id="event">
            <div class="container">
                <div class="row">
                    <article class="main_event col-lg-9 mb-5">
                        <div class="event-title">
                            <h1>{{ $event->theme }}</h1>
                            <div class="article-info">
                                <span class="author"><i class="fas fa-chalkboard-teacher"></i> {{ $event->animateur }}</span>
                                <span class="date"><i class="far fa-calendar-alt"></i> {{ date('F jS, Y', strtotime($event->date)) }}</span>
                                <span class="time"><i class="far fa-clock"></i> {{ $event->heure }}</span>
                                <span class="location"><i class="fas fa-map-marker-alt"></i> {{ $event->lieu }}</span>
                            </div>
                        </div>
                        <div class="affiche">
                            <img src="{{ asset('uploads/events/'. $event->affiche ) }}" alt="affiche" class="img-fluid">
                        </div>
                        <div class="m-3">
                            <h5 style="font-weight: 700;">Partagez cet événement :</h5>
                            <button class="social_share btn btn-primary mb-1" data-type="facebook"><i class="fab fa-facebook-f"></i> Facebook</button>
                            <button class="social_share btn btn-info mb-1" data-type="twitter"><i class="fab fa-twitter"></i> Twitter</button>
                            <button class="btn btn-primary social_share mb-1" data-type="linkedin"><i class="fab fa-linkedin-in"></i> LinkedIn</button>
                            <button class="social_share btn btn-success mb-1" data-type="whatsapp"><i class="fab fa-whatsapp"></i> Whatsapp</button>
                            <button class="btn btn-danger social_share mb-1" data-type="pinterest"><i class="fab fa-pinterest"></i> Pinterest</button>
                            <button class="social_share btn btn-danger mb-1" data-type="email"><i class="far fa-envelope"></i> Email</button>
                            </div>
                    </article>
    
                    <aside id="team" class="col-lg-3 single-event">
                        <div style="margin-left: 15px;">
                            <h3 class="latest-events">Derniers évènements</h3>
                            <div class="row">
                                @foreach ($events as $event)
                                <div class="col-lg-12 col-md-6 mb30">
                                    <div class="fp-wrap">
                                        <a href="{{ route('event', $event->slug) }}">
                                            <div class="event-info">
                                                <div class="inner">
                                                    <span class="event-date"><i class="far fa-calendar-alt"></i> {{ date('d / m / Y', strtotime($event->date)) }}</span>
                                                    <span class="event-time"><i class="far fa-clock"></i> {{ $event->heure }}</span>
                                                </div>
                                            </div>								
                                            <img src="{{ asset('uploads/events/'. $event->affiche ) }}" class="fp-image img-fluid" alt="Event img">
                                        </a>
                                    </div>
                                    <div class="membre-info text-center">
                                        <h4>{{ $event->theme }}</h4>
                                        <span>{{ $event->lieu }}</span>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
    @include('master.footer')
@endsection