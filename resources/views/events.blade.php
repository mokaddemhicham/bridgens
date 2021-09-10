@extends('master.layout')
@section('title')
    Evénements
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1>Nos Evénements</h1>
                    <p>Bienvenue sur la page des Evénements</p>
                </div>
            </div>
        </section>
        <section id="team">
            <div class="container">
                <div class="row">
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($events as $event)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb30 wow fadeInUp" data-wow-delay="{{ $x = $x + 0.1 }}s">
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
                <div class="d-flex justify-content-center">
                    {{ $events->links() }}
                </div>
            </div>
        </section>
    @include('master.footer')
@endsection