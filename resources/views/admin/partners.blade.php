@extends('admin.master.layout')
@section('title')
    Partenaires
@endsection
@section('current-page')
    Partenaires
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
                <h3>Partenaires</h3>
                <a href="#" uk-toggle="target: #modal-close-default"><i class="fas fa-plus"></i> Ajouter un Partenaire</a>

                <div id="modal-close-default" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title">Ajouter un Partenaire</h2>
                        <form action="{{ route('insert.partner') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="inputs-group">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="Partenaire" class="mb-1">Nom <span class="required" title="required">*</span></label>
                                        <input class="uk-input " type="text" placeholder="Nom du Partenaire" id="Partenaire" name="nom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="website" class="mb-1" style="line-height: 30px;">site Web</label>
                                        <input class="uk-input" type="text" placeholder="site Web" id="website" name="website">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Logo" class="mb-1">Logo <span class="required" title="required">*</span></label>
                                        <input class="form-control" id="Logo" type="file" name="logo" required>
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
                            <th>logo</th>
                            <th>nom</th>
                            <th>site Web</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner)
                            <tr>
                                <td><img src="{{ asset('uploads/partners/'. $partner->logo) }}" alt="Partner Logo" width="50" /></td>
                                <td>{{ $partner->nom }}</td>
                                <td><a href="{{ $partner->website }}" target="_blank">{{ $partner->website }}</a></td>
                                <td>
                                    <a href="#" uk-toggle="target: #modal-close-default-view-{{ $partner->id }}"><i class="far fa-eye"></i></a>

                                    <div id="modal-close-default-view-{{ $partner->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <div>
                                                <div class="inputs-group">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group mb-2">
                                                                <label for="Partenaire" class="mb-1">Nom</label>
                                                                <input class="uk-input " type="text" placeholder="Nom du Partenaire" id="Partenaire" value="{{ $partner->nom }}" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="website" class="mb-1">site Web</label>
                                                                <input class="uk-input" type="text" placeholder="site Web" id="website" value="{{ $partner->website }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 d-flex align-items-center" style="margin-top: 25px;">
                                                            <img src="{{ asset('uploads/partners/'. $partner->logo) }}" alt="logo" />
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" uk-toggle="target: #modal-close-default-edit-{{ $partner->id }}"><i class="far fa-edit"></i></a>

                                    <div id="modal-close-default-edit-{{ $partner->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('update.partner', $partner->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <label for="Partenaire" class="mb-1">Nom</label>
                                                            <input class="uk-input " type="text" placeholder="Nom du Partenaire" id="Partenaire" value="{{ $partner->nom }}" name="nom">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="website" class="mb-1">site Web</label>
                                                                <input class="uk-input" type="text" placeholder="site Web" id="website" value="{{ $partner->website }}" name="website">
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="Logo" class="mb-1">Logo</label>
                                                                <input class="form-control" id="Logo" type="file" name="logo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 d-flex align-items-center" style="margin-top: 25px;">
                                                            <img src="{{ asset('uploads/partners/'. $partner->logo) }}" alt="logo" />
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
                                    <a href="#" uk-toggle="target: #modal-close-default-delete-{{ $partner->id }}"><i class="far fa-trash-alt"></i></a>

                                    <div id="modal-close-default-delete-{{ $partner->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('delete.partner', $partner->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="inputs-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>Êtes-vous sûr Voulez-vous supprimer ce Partenaire ?</p>
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
            {{ $partners->links() }}
        </div>
    </div>
@endsection