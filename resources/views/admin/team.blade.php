@extends('admin.master.layout')
@section('title')
    Membres
@endsection
@section('current-page')
    Membres
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
                <h3>Membres</h3>
                <div class="side">
                    <a href="{{ route('downloadPDF') }}" class="c-btn btn btn-secondary"><i class="fas fa-file-pdf"></i> Télécharger PDF</a>
                    <a href="#" uk-toggle="target: #modal-close-default" class="c-btn btn btn-secondary"><i class="fas fa-plus"></i> Ajouter un Membre</a>
                    <div id="modal-close-default" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <h2 class="uk-modal-title">Ajouter un membre</h2>
                            <form action="{{ route('insert.member') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="inputs-group">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="nom" class="mb-1">NOM <span class="required" title="required">*</span></label>
                                            <input class="uk-input " type="text" placeholder="Nom" id="nom" name="nom" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="prenom" class="mb-1">PRÉNOM <span class="required" title="required">*</span></label>
                                            <input class="uk-input" type="text" placeholder="Prénom" id="prenom" name="prenom" required>
                                        </div>
                                        
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md">
                                            <label for="email" class="mb-1">E-MAIL <span class="required" title="required">*</span></label>
                                            <input class="uk-input" type="email" placeholder="E-MAIL" id="email" name="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="mb-1">Téléphone <span class="required" title="required">*</span></label>
                                            <input class="uk-input" type="tel" placeholder="Téléphone" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="filiere" class="mb-1">FILIÈRE <span class="required" title="required">*</span></label>
                                            <input class="uk-input" type="text" placeholder="FILIÈRE" id="filiere" name="filiere" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="role" class="mb-1">ROLE <span class="required" title="required">*</span></label>
                                            <input class="uk-input" type="text" placeholder="Role" id="role" name="role" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="photo" class="mb-1">Photo</label>
                                            <input class="form-control" id="photo" type="file" name="photo">
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
            </div>
            <div class="uk-overflow-auto card-body">
                <table class="uk-table uk-table-divider uk-table-hover" >
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Filière</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->nom }}</td>
                                <td>{{ $member->prenom }}</td>
                                <td><a href="mailto:{{ $member->email }}">{{ $member->email }}</a></td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->filiere }}</td>
                                <td>{{ $member->role }}</td>
                                <td>
                                    <a href="#" uk-toggle="target: #modal-close-default-view-{{ $member->id }}"><i class="far fa-eye"></i></a>

                                    <div id="modal-close-default-view-{{ $member->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <div>
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="nom" class="mb-1">NOM</label>
                                                            <input class="uk-input " type="text" placeholder="Nom" id="nom" value="{{ $member->nom }}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="prenom" class="mb-1">PRÉNOM</label>
                                                            <input class="uk-input" type="text" placeholder="Prénom" value="{{ $member->prenom }}" id="prenom" disabled>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="email" class="mb-1">E-MAIL</label>
                                                            <input class="uk-input" type="email" placeholder="E-MAIL" value="{{ $member->email }}" id="email" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="mb-1">Téléphone</label>
                                                            <input class="uk-input" type="tel" placeholder="Téléphone" value="{{ $member->phone }}" id="phone" name="phone" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="filiere" class="mb-1">FILIÈRE</label>
                                                            <input class="uk-input" type="text" placeholder="FILIÈRE" value="{{ $member->filiere }}" id="filiere" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="role" class="mb-1">ROLE</label>
                                                            <input class="uk-input" type="text" placeholder="Role" value="{{ $member->role }}" id="role" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="photo" class="mb-1">Photo</label>
                                                            @if ($member->photo)
                                                                <img src="{{ asset('uploads/team/'. $member->photo) }}" alt="{{ $member->nom . ' ' .  $member->prenom}}" class="card-img-top" id="photo">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $member->nom . '+' .  $member->prenom}}&size=240" alt="{{ $member->nom . ' ' .  $member->prenom}}" class="card-img-top" id="photo">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" uk-toggle="target: #modal-close-default-edit-{{ $member->id }}"><i class="far fa-edit"></i></a>

                                    <div id="modal-close-default-edit-{{ $member->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('update.member', $member->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="nom" class="mb-1">NOM</label>
                                                            <input class="uk-input " type="text" placeholder="Nom" id="nom" value="{{ $member->nom }}" name="nom">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="prenom" class="mb-1">PRÉNOM</label>
                                                            <input class="uk-input" type="text" placeholder="Prénom" value="{{ $member->prenom }}" id="prenom" name="prenom">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="email" class="mb-1">E-MAIL</label>
                                                            <input class="uk-input" type="email" placeholder="E-MAIL" value="{{ $member->email }}" id="email" name="email">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="mb-1">Téléphone</label>
                                                            <input class="uk-input" type="tel" placeholder="Téléphone" value="{{ $member->phone }}" id="phone" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="filiere" class="mb-1">FILIÈRE</label>
                                                            <input class="uk-input" type="text" placeholder="FILIÈRE" value="{{ $member->filiere }}" id="filiere" name="filiere">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="role" class="mb-1">ROLE</label>
                                                            <input class="uk-input" type="text" placeholder="Role" value="{{ $member->role }}" id="role" name="role">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <label for="photo" class="mb-1">Photo</label>
                                                            <input class="form-control" id="photo" type="file" name="photo">
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if ($member->photo)
                                                                <img src="{{ asset('uploads/team/'. $member->photo) }}" alt="{{ $member->nom . ' ' .  $member->prenom}}" class="card-img-top">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $member->nom . '+' .  $member->prenom}}&size=240" alt="{{ $member->nom . ' ' .  $member->prenom}}" class="card-img-top">
                                                            @endif
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
                                    <a href="#" uk-toggle="target: #modal-close-default-delete-{{ $member->id }}"><i class="far fa-trash-alt"></i></a>

                                    <div id="modal-close-default-delete-{{ $member->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('delete.member', $member->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="inputs-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>Êtes-vous sûr Voulez-vous supprimer ce membre ?</p>
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
            {{ $members->links() }}
        </div>
    </div>
@endsection