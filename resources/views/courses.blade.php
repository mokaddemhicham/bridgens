@extends('master.layout')
@section('title')
    Mes Cours
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1>Mes Cours</h1>
                    <p>Bienvenue sur la page des cours</p>
                </div>
            </div>
        </section>
        <section id="team" class="courses">
            <div class="container">
                <div class="row">
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($courses as $course)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb30 wow fadeInUp" data-wow-delay="{{ $x = $x + 0.1 }}s">
                            <div class="card">
                                <div class="custom-card-header">
                                    <img class="card-img-top" src="{{ asset('uploads/courses/'. $course->image) }}" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $course->nom }}</h5>
                                <p class="card-text"><i class="fas fa-chalkboard-teacher"></i> {{ $course->enseignant }}</p>
                                <a href="{{ route('course', $course->slug) }}" class="btn btn-outline-primary">Accéder</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </section>
    @include('master.footer')
@endsection