@extends('master.layout')
@section('title')
    Membres
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1>Membres</h1>
                    <p>Bienvenue sur la page des Membres</p>
                </div>
            </div>
        </section>
        <section id="team">
            <div class="container">
                <div class="row">
                    @foreach ($members as $member)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb30 team">
                            <div class="card">
                                <div class="card-header">
                                    @if ($member->photo)
                                        <img src="{{ asset('uploads/team/'. $member->photo) }}" alt="{{ $member->nom . ' ' .  $member->prenom}}" class="card-img-top">
                                    @else
                                        <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $member->nom . '+' .  $member->prenom}}&size=240" alt="{{ $member->nom . ' ' .  $member->prenom}}" class="card-img-top">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4>{{ $member->nom . ' ' .  $member->prenom}}</h4>
                                    <h6>{{ $member->filiere }}</h6>
                                    <span>{{ $member->role }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @include('master.footer')
@endsection