@extends('master.layout')
@section('title')
    {{ $Course->nom }}
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader" class="single-event">
        </section>
        <main id="event">
            <div class="container">
                <div class="row">
                    <article class="main_event col-lg-9 mb-5">
                        <div class="event-title course">
                            <div class="float-title">
                                <h1>{{ $Course->nom }}</h1>
                                <div class="article-info">
                                    <span class="author"><i class="fas fa-chalkboard-teacher"></i> {{ $Course->enseignant }}</span>
                                </div>
                            </div>
                            <img src="{{ asset('uploads/courses/'. $Course->image) }}" alt="cours image" class="img-fluid">
                        </div>
                        <div class="accordion" id="accordionExample">
                          @foreach ($chapitres as $chapitre)
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="heading-{{ $chapitre->id }}">
                                <button class="accordion-button {{ $chapitre->id === 1 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $chapitre->id }}" aria-expanded="true" aria-controls="collapse-{{ $chapitre->id }}">
                                    {{ $chapitre->name }}
                                </button>
                              </h2>
                              <div id="collapse-{{ $chapitre->id }}" class="accordion-collapse collapse {{ $chapitre->id === 1 ? 'show' : '' }}" aria-labelledby="heading-{{ $chapitre->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <ul class="cours-content">
                                    @foreach ($documents as $document)
                                        @if ($chapitre->id === $document->chapitre_id)
                                            @if ($document->type === 'pdf')
                                                <li>
                                                <a href="{{ asset('uploads/courses/files/'. $document->document) }}" download="{{ $document->nom }}"><i class="fas fa-file-pdf"></i> {{ $document->nom }}</a>
                                                <span class="comment"></span>
                                                </li>
                                            @elseif($document->type === 'video')
                                                <li>
                                                    <span class="comment">{{ $document->nom }}</span>
                                                    <iframe class="iframe-youtube" src="{{ $document->document }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </li>
                                            @else
                                                <li>
                                                <span>{{ $document->nom }}</span>
                                                <span class="comment">
                                                    {{ $document->document }}
                                                </span>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        <div class="mt-3">
                            <h5 style="font-weight: 700;">Partagez ce cours :</h5>
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
                            <h3 class="latest-events">Derniers Cours</h3>
                            <div class="row">
                                @foreach ($Courses as $Course)
                                    <div class="col-lg-12 col-sm-6 mb30">
                                        <div class="card">
                                            <div class="custom-card-header">
                                                <img class="card-img-top" src="{{ asset('uploads/courses/'. $Course->image) }}" alt="Card image cap">
                                            </div>
                                            <div class="card-body">
                                            <h5 class="card-title">{{ $Course->nom }}</h5>
                                            <p class="card-text"><i class="fas fa-chalkboard-teacher"></i> {{ $Course->enseignant }}</p>
                                            <a href="{{ route('course' , $Course->slug) }}" class="btn btn-outline-primary">Accéder</a>
                                            </div>
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