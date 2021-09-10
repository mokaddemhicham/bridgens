@extends('admin.master.layout')
@section('title')
    Formations
@endsection
@section('current-page')
    Formations
@endsection
@section('content')
    <div class="main-users">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="users card">
            <div class="table-header card-header">
                <h3>Formations</h3>
                <a href="#" uk-toggle="target: #modal-close-default"><i class="fas fa-plus"></i> Ajouter une Formation</a>

                <div id="modal-close-default" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title">Ajouter une Formation</h2>
                        <form action="{{ route('insert.formation') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="inputs-group">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="theme" class="mb-1">Formation <span class="required" title="required">*</span></label>
                                        <input class="uk-input " type="text" placeholder="Formation" id="theme" name="theme" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="Animateur" class="mb-1">Animateur <span class="required" title="required">*</span></label>
                                        <input class="uk-input" type="text" placeholder="Animateur" id="Animateur" name="animateur" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Date" class="mb-1">Date <span class="required" title="required">*</span></label>
                                        <input class="uk-input " type="date" placeholder="Date" id="Date" name="date" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="Heure" class="mb-1">Heure <span class="required" title="required">*</span></label>
                                        <input class="uk-input" type="time" placeholder="Heure" id="Heure" name="heure" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Lieu" class="mb-1">Lieu <span class="required" title="required">*</span></label>
                                        <input class="uk-input" type="text" placeholder="Lieu" id="Lieu" name="lieu" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Affiche" class="mb-1">Affiche <span class="required" title="required">*</span></label>
                                        <input class="form-control" id="Affiche" type="file" name="affiche" required>
                                    </div>
                                </div>
                            </div>
                            <p class="uk-text-right">
                                <button class="btn btn-secondary uk-modal-close" type="button"><i class="fas fa-times"></i> Annuler</button>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Ajouter</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-overflow-auto card-body">
                <table class="uk-table uk-table-divider uk-table-hover" >
                    <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Titre</th>
                            <th>Animateur</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Lieu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formations as $formation)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/formations/' . $formation->formation) }}" alt="event" width="40" />
                                </td>
                                <td>{{ Str::limit($formation->theme, 40) }}</td>
                                <td>{{ $formation->animateur }}</td>
                                <td>{{ date('d / m / Y', strtotime($formation->date)) }}</td>
                                <td>{{ $formation->heure }}</td>
                                <td>{{ $formation->lieu }}</td>
                                <td>
                                    <a href="#" uk-toggle="target: #modal-close-default-view-{{ $formation->id }}"><i class="far fa-eye"></i></a>

                                    <div id="modal-close-default-view-{{ $formation->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <div>
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <label for="Formation" class="mb-1">Formation</label>
                                                            <input class="uk-input " type="text" placeholder="Formation" id="Formation" value="{{$formation->theme}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <label for="Animateur" class="mb-1">Animateur</label>
                                                            <input class="uk-input" type="text" placeholder="Animateur" id="Animateur" value="{{ $formation->animateur }}" disabled>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label for="Date" class="mb-1">Date</label>
                                                            <input class="uk-input" type="date" placeholder="Date" id="Date" value="{{$formation->date}}" disabled>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label for="Heure" class="mb-1">Heure</label>
                                                            <input class="uk-input" type="time" placeholder="Heure" id="Heure" value="{{$formation->heure}}" disabled>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label for="Lieu" class="mb-1">Lieu</label>
                                                            <input class="uk-input" type="text" placeholder="Lieu" id="Lieu" value="{{ $formation->lieu }}" disabled>
                                                        </div>
                                                        @if ($formation->video)
                                                            <div class="col-md-6">
                                                                <label for="Affiche-img" class="mb-2">Affiche</label>
                                                                <img src="{{ asset('uploads/formations/'. $formation->formation ) }}" alt="formation" id="Affiche-img" class="img-affiche">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="video-yt" class="mb-1 d-block">Video</label>
                                                                <iframe class="iframe-youtube" src="{{ $formation->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-yt" width="100%" height="250"></iframe>
                                                            </div>
                                                        @else
                                                        <div class="col-md-12">
                                                            <label for="Affiche-img" class="mb-2">Affiche</label>
                                                            <img src="{{ asset('uploads/formations/'. $formation->formation ) }}" alt="formation" id="Affiche-img" class="img-affiche">
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" uk-toggle="target: #modal-close-default-edit-{{ $formation->id }}"><i class="far fa-edit"></i></a>

                                    <div id="modal-close-default-edit-{{ $formation->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('update.formation', $formation->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <label for="theme" class="mb-1">Formation</label>
                                                            <input class="uk-input " type="text" placeholder="Formation" id="theme" value="{{ $formation->theme }}" name="theme">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="Animateur" class="mb-1">Animateur</label>
                                                                <input class="uk-input" type="text" placeholder="Animateur" id="Animateur" value="{{ $formation->animateur }}" name="animateur">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="Date" class="mb-1">Date</label>
                                                                <input class="uk-input" type="date" placeholder="Date" id="Date" value="{{$formation->date}}" name="date">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="Heure" class="mb-1">Heure</label>
                                                                <input class="uk-input" type="time" placeholder="Heure" id="Heure" value="{{$formation->heure}}" name="heure">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="Lieu" class="mb-1">Lieu</label>
                                                                <input class="uk-input" type="text" placeholder="Lieu" id="Lieu" value="{{ $formation->lieu }}" name="lieu">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="Affiche" class="mb-1">Affiche</label>
                                                                <input class="form-control" id="Affiche" type="file" name="affiche">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-4">
                                                            <img src="{{ asset('uploads/formations/'. $formation->formation ) }}" alt="image du  formation" id="Affiche-img" class="img-affiche">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="link-yt" class="mb-1">Lien du Vidéo</label>
                                                            <input class="uk-input" id="link-yt" type="text" placeholder="Lien du Vidéo" name="video" value="{{ $formation->video }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="uk-text-right">
                                                    <button class="btn btn-secondary uk-modal-close" type="button"><i class="fas fa-times"></i> Annuler</button>
                                                    <button class="btn btn-success" type="submit"><i class="far fa-edit"></i> Modifier</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <a href="#" uk-toggle="target: #modal-close-default-delete-{{ $formation->id }}"><i class="far fa-trash-alt"></i></a>

                                    <div id="modal-close-default-delete-{{ $formation->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('delete.formation', $formation->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="inputs-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>Êtes-vous sûr Voulez-vous supprimer cette Formation ?</p>
                                                        </div>
                                                    </div>
                                                    <p class="uk-text-right">
                                                        <button class="btn btn-secondary uk-modal-close" type="button"><i class="fas fa-times"></i> Annuler</button>
                                                        <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> Supprimer</button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $formations->links() }}
        </div>
    </div>
@endsection