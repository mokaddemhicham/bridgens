@extends('master.layout')
@section('title')
    Formations
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1>Nos Formations</h1>
                    <p>Bienvenue sur la page des Formations</p>
                </div>
            </div>
        </section>
        <section id="team">
            <div class="container">
                <div class="row">
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($formations as $formation)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb30 wow fadeInUp" data-wow-delay="{{ $x = $x + 0.1 }}s">
                            <div class="fp-wrap">
                                <a href="{{ route('formation', $formation->slug) }}">
                                    <div class="event-info">
                                        <div class="inner">
                                            <span class="event-date"><i class="far fa-calendar-alt"></i> {{ date('d / m / Y', strtotime($formation->date)) }}</span>
                                            <span class="event-time"><i class="far fa-clock"></i> {{ $formation->heure }}</span>
                                        </div>
                                    </div>								
                                    <img src="{{ asset('uploads/formations/'. $formation->formation ) }}" class="fp-image img-fluid" alt="image du formation">
                                </a>
                            </div>
                            <div class="membre-info text-center">
                                <h4>{{ $formation->theme }}</h4>
                                <span>{{ $formation->lieu }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $formations->links() }}
                </div>
            </div>
        </section>
    @include('master.footer')
@endsection