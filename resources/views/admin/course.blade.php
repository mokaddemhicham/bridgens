@extends('admin.master.layout')
@section('title')
    {{ $Course->nom }}
@endsection
@section('current-page')
    {{ $Course->nom }}
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
                <h3>Documents</h3>

                <div class="row">
                    <div class="col drop">
                        <a class="btn btn-secondary custom-btn" href="#" uk-toggle="target: #modal-close-default-add-chapitre">Ajouter un Chapitre</a>
                        <div id="modal-close-default-add-chapitre" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <h2 class="uk-modal-title">Ajouter un Chapitre</h2>
                                <form action="{{ route('insert.chapter', $Course->id) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="inputs-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="docname" class="mb-1">Nom du Chapitre<span class="required" title="required">*</span></label>
                                                <input class="uk-input" type="text" placeholder="Nom du Chapitre" id="docname" name="chapitre">
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
                    <div class="drop col">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Ajouter un Document
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" uk-toggle="target: #modal-close-default-file"><i class="fas fa-file-pdf"></i> Fichier PDF</a></li>
                            
                            <div id="modal-close-default-file" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <h2 class="uk-modal-title">Ajouter un Fichier</h2>
                                    <form action="{{ route('insert.file.document', $Course->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="inputs-group">
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="docname" class="mb-1">Nom <span class="required" title="required">*</span></label>
                                                    <input class="uk-input" type="text" placeholder="Nom du Document" id="docname" name="filename">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" >Choisir un Chapitre <span class="required" title="required">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="chapitre">
                                                        <option selected value="">Choisir un Chapitre</option>
                                                        @foreach ($chapitres as $chapitre)
                                                            <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="file" class="mb-1">Fichier <span class="required" title="required">*</span></label>
                                                    <input class="form-control" id="file" type="file" name="file">
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
                            <li><a class="dropdown-item" href="#" uk-toggle="target: #modal-close-default-video"><i class="fas fa-file-video"></i> Video</a></li>
        
                            <div id="modal-close-default-video" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <h2 class="uk-modal-title">Ajouter un Video</h2>
                                    <form action="{{ route('insert.video.document', $Course->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="inputs-group">
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="video" class="mb-1">Titre <span class="required" title="required">*</span></label>
                                                    <input class="uk-input" type="text" placeholder="Titre du Video" id="video" name="filename">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" >Choisir un Chapitre <span class="required" title="required">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="chapitre">
                                                        <option selected value="">Choisir un Chapitre</option>
                                                        @foreach ($chapitres as $chapitre)
                                                            <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="videoLink" class="mb-1">Lien du Video <span class="required" title="required">*</span></label>
                                                    <input class="uk-input" type="text" placeholder="Lien du Video" id="videoLink" name="file">
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
        
                            <li><a class="dropdown-item" href="#" uk-toggle="target: #modal-close-default-text"><i class="fas fa-file-word"></i> Texte</a></li>
        
                            <div id="modal-close-default-text" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <h2 class="uk-modal-title">Ajouter un Texte</h2>
                                    <form action="{{ route('insert.text.document', $Course->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="inputs-group">
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="docname" class="mb-1">Titre du Texte <span class="required" title="required">*</span></label>
                                                    <input class="uk-input" type="text" placeholder="Titre du Texte" id="filename" name="filename">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" >Choisir un Chapitre <span class="required" title="required">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="chapitre">
                                                        <option selected value="">Choisir un Chapitre</option>
                                                        @foreach ($chapitres as $chapitre)
                                                            <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Text" class="mb-1">Texte <span class="required" title="required">*</span></label>
                                                    <textarea class="uk-textarea" rows="5" placeholder="Texte Long" id="Text" name="file"></textarea>
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
        
                            </ul>
                    </div>
                </div>

            
            </div>
            <div class="row">
                <div class="col-md-8" style="border-right: 1px solid #d8d8d8">
                    <div class="uk-overflow-auto card-body">
                        <table class="uk-table uk-table-divider uk-table-hover" >
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Chapitre</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    @if ($document->type === "pdf")
                                        <tr>
                                            <td><i class="fas fa-file-pdf doc-icon"></i></td>
                                            <td>{{ Str::limit($document->nom, 30) }}</td>
                                            <td>{{ Str::limit($document->chapitre->name, 30) }}</td>
                                            <td>
                                                <a href="#" uk-toggle="target: #modal-close-default-view-pdf-{{ $document->id }}"><i class="far fa-eye"></i></a>

                                                <div id="modal-close-default-view-pdf-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <div>
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col-12 mb-1">
                                                                        <label for="docname" class="mb-1">Nom</label>
                                                                        <input class="uk-input" type="text" placeholder="Nom du Document" id="docname" value="{{ $document->nom }}" disabled>
                                                                    </div>
                                                                    <div class="col-12 mb-1">
                                                                        <label for="enseignant" class="mb-1">Chapitre</label>
                                                                        <select class="form-select" aria-label="Default select example" disabled>
                                                                            <option>Choisir une Chapitre</option>
                                                                            @foreach ($chapitres as $chapitre)
                                                                                @if ($chapitre->id === $document->chapitre_id)
                                                                                    <option value="{{ $chapitre->id }}" selected>{{ $chapitre->name }}</option>   
                                                                                @else
                                                                                    <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 mb-1">
                                                                        <label for="file" class="mb-1">Fichier</label>
                                                                        <a href="{{ asset('uploads/courses/files/'. $document->document) }}" class="d-block" style="color: red" id="file" ><i class="fas fa-file-pdf" style="font-size: 14px;"></i> {{ $document->nom }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" uk-toggle="target: #modal-close-default-edit-pdf-{{ $document->id }}"><i class="far fa-edit"></i></a>

                                                <div id="modal-close-default-edit-pdf-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <form action="{{ route('update.File.document', [$document->cours_id, $document->id]) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col-12 mb-1">
                                                                        <label for="docname" class="mb-1">Nom</label>
                                                                        <input class="uk-input" type="text" placeholder="Nom du Document" id="docname" value="{{ $document->nom }}" name="filename">
                                                                    </div>
                                                                    <div class="col-12 mb-1">
                                                                        <label for="enseignant" class="mb-1">Chapitre</label>
                                                                        <select class="form-select" aria-label="Default select example" name="chapitre">
                                                                            @foreach ($chapitres as $chapitre)
                                                                                @if ($chapitre->id === $document->chapitre_id)
                                                                                    <option value="{{ $chapitre->id }}" selected>{{ $chapitre->name }}</option>   
                                                                                @else
                                                                                    <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <label for="file" class="mb-1">Fichier</label>
                                                                        <input class="form-control" id="file" type="file" name="file">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <a href="{{ asset('uploads/courses/files/'. $document->document) }}" class="d-block" style="color: red" id="file" ><i class="fas fa-file-pdf" style="font-size: 14px;"></i> {{ $document->nom }}</a>
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
                                                <a href="#" uk-toggle="target: #modal-close-default-delete-pdf-{{ $document->id }}"><i class="far fa-trash-alt"></i></a>

                                                <div id="modal-close-default-delete-pdf-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <form action="{{ route('delete.File.document', [$document->cours_id, $document->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>Êtes-vous sûr Voulez-vous supprimer ce Fichier ?</p>
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
                                    @elseif($document->type === "video")
                                        <tr>
                                            <td><i class="fas fa-file-video doc-icon"></i></td>
                                            <td>{{ Str::limit($document->nom, 30) }}</td>
                                            <td>{{ Str::limit($document->chapitre->name, 30) }}</td>
                                            <td>
                                                <a href="#" uk-toggle="target: #modal-close-default-view-video-{{ $document->id }}"><i class="far fa-eye"></i></a>

                                                <div id="modal-close-default-view-video-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <div>
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col-12 mb-1">
                                                                        <label for="video" class="mb-1">Titre</label>
                                                                        <input class="uk-input" type="text" placeholder="Titre du Video" id="video" value="{{ $document->nom }}" disabled>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <label class="mb-1">Chapitre</label>
                                                                        <select class="form-select" aria-label="Default select example" disabled>
                                                                            <option >Choisir une Chapitre</option>
                                                                            @foreach ($chapitres as $chapitre)
                                                                                @if ($chapitre->id === $document->chapitre_id)
                                                                                    <option value="{{ $chapitre->id }}" selected>{{ $chapitre->name }}</option>   
                                                                                @else
                                                                                    <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="video-yt" class="mb-1 d-block">Video</label>
                                                                        <iframe class="iframe-youtube" src="{{ $document->document }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-yt" width="100%" height="250"></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" uk-toggle="target: #modal-close-default-edit-video-{{ $document->id }}"><i class="far fa-edit"></i></a>

                                                <div id="modal-close-default-edit-video-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <form action="{{ route('update.video.document', [$document->cours_id, $document->id]) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col-12 mb-1">
                                                                        <label for="video" class="mb-1">Titre</label>
                                                                        <input class="uk-input" type="text" placeholder="Titre du Video" id="video" value="{{ $document->nom }}" name="filename">
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <label class="mb-1">Chapitre</label>
                                                                        <select class="form-select" aria-label="Default select example" name="chapitre">
                                                                            @foreach ($chapitres as $chapitre)
                                                                                @if ($chapitre->id === $document->chapitre_id)
                                                                                    <option value="{{ $chapitre->id }}" selected>{{ $chapitre->name }}</option>   
                                                                                @else
                                                                                    <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <label for="videoLink" class="mb-1">Lien du Video</label>
                                                                        <input class="uk-input" type="text" placeholder="Lien du Video" id="videoLink" value="{{ $document->document }}" name="file">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <iframe class="iframe-youtube" src="{{ $document->document }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="100%" height="250"></iframe>
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
                                                <a href="#" uk-toggle="target: #modal-close-default-delete-video-{{ $document->id }}"><i class="far fa-trash-alt"></i></a>

                                                <div id="modal-close-default-delete-video-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <form action="{{ route('delete.video.document', [$document->cours_id, $document->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>Êtes-vous sûr Voulez-vous supprimer ce Video ?</p>
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
                                    @else
                                        <tr>
                                            <td><i class="fas fa-file-word doc-icon"></i></td>
                                            <td>{{ Str::limit($document->nom, 30) }}</td>
                                            <td>{{ Str::limit($document->chapitre->name, 30) }}</td>
                                            <td>
                                                <a href="#" uk-toggle="target: #modal-close-default-view-text-{{ $document->id }}"><i class="far fa-eye"></i></a>

                                                <div id="modal-close-default-view-text-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <div action="#" method="post">
                                                            <div class="inputs-group">
                                                                <div class="row mb-2">
                                                                    <div class="col-12 mb-1">
                                                                        <label for="docname" class="mb-1">Titre du Texte</label>
                                                                        <input class="uk-input" type="text" placeholder="Titre du Texte" id="docname" value="{{ $document->nom }}" disabled>
                                                                    </div>
                                                                    <div class="col-12  mb-1">
                                                                        <label for="enseignant" class="mb-1">Chapitre</label>
                                                                        <select class="form-select" aria-label="Default select example" disabled>
                                                                            <option >Choisir une Chapitre</option>
                                                                            @foreach ($chapitres as $chapitre)
                                                                                @if ($chapitre->id === $document->chapitre_id)
                                                                                    <option value="{{ $chapitre->id }}" selected>{{ $chapitre->name }}</option>   
                                                                                @else
                                                                                    <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="Text" class="mb-1">Texte</label>
                                                                        <textarea class="uk-textarea" rows="5" placeholder="Texte Long" id="Text" disabled>{{ $document->document }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" uk-toggle="target: #modal-close-default-edit-text-{{ $document->id }}"><i class="far fa-edit"></i></a>

                                                <div id="modal-close-default-edit-text-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <form action="{{ route('update.text.document', [$document->cours_id, $document->id]) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="inputs-group">
                                                                <div class="row mb-2">
                                                                    <div class="col-12 mb-1">
                                                                        <label for="docname" class="mb-1">Titre du Texte</label>
                                                                        <input class="uk-input" type="text" placeholder="Titre du Texte" id="docname" value="{{ $document->nom }}" name="filename">
                                                                    </div>
                                                                    <div class="col-12  mb-1">
                                                                        <label for="enseignant" class="mb-1">Chapitre</label>
                                                                        <select class="form-select" aria-label="Default select example" name="chapitre">
                                                                            @foreach ($chapitres as $chapitre)
                                                                                @if ($chapitre->id === $document->chapitre_id)
                                                                                    <option value="{{ $chapitre->id }}" selected>{{ $chapitre->name }}</option>   
                                                                                @else
                                                                                    <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>   
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="Text" class="mb-1">Texte</label>
                                                                        <textarea class="uk-textarea" rows="5" placeholder="Texte Long" id="Text" name="file">{{ $document->document }}</textarea>
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
                                                <a href="#" uk-toggle="target: #modal-close-default-delete-text-{{ $document->id }}"><i class="far fa-trash-alt"></i></a>

                                                <div id="modal-close-default-delete-text-{{ $document->id }}" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                                        
                                                        <form action="{{ route('delete.text.document', [$document->cours_id, $document->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="inputs-group">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>Êtes-vous sûr Voulez-vous supprimer ce Texte ?</p>
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
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-3">
                            {{ $documents->links() }}
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="uk-overflow-auto card-body">
                        <table class="uk-table uk-table-divider uk-table-hover" >
                            <thead>
                                <tr>
                                    <th>Chapitre</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapitres as $chapitre)
                                    <tr>
                                        <td>{{ $chapitre->name }}</td>
                                        <td>
                                            <a href="#" uk-toggle="target: #modal-close-default-edit-chapter-{{ $chapitre->id }}"><i class="far fa-edit"></i></a>
                                            <div id="modal-close-default-edit-chapter-{{ $chapitre->id }}" uk-modal>
                                                <div class="uk-modal-dialog uk-modal-body">
                                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                                    
                                                    <form action="{{ route('update.chapter', [$Course->id, $chapitre->id]) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="inputs-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="docname" class="mb-1">Nom du Chapitre<span class="required" title="required">*</span></label>
                                                                    <input class="uk-input" type="text" placeholder="Nom du Chapitre" id="docname" name="chapitre" value="{{ $chapitre->name }}">
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
                                            <a href="#" uk-toggle="target: #modal-close-default-delete-chapitre-{{ $chapitre->id }}"><i class="far fa-trash-alt"></i></a>
                                            <div id="modal-close-default-delete-chapitre-{{ $chapitre->id }}" uk-modal>
                                                <div class="uk-modal-dialog uk-modal-body">
                                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                                    
                                                    <form action="{{ route('delete.chapter', [$Course->id, $chapitre->id]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="inputs-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>Êtes-vous sûr Voulez-vous supprimer ce Chapitre ?</p>
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
            </div>
        </div>
    </div>
@endsection