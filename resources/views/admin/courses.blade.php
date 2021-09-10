@extends('admin.master.layout')
@section('title')
    Cours
@endsection
@section('current-page')
    Cours
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
                <h3>Cours</h3>
                <a href="#" uk-toggle="target: #modal-close-default"><i class="fas fa-plus"></i> Ajouter un Cours</a>

                <div id="modal-close-default" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title">Ajouter un Cours</h2>
                        <form action="{{ route('insert.course') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="inputs-group">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="cours" class="mb-1">Nom <span class="required" title="required">*</span></label>
                                        <input class="uk-input " type="text" placeholder="Nom du Cours" id="Cours" name="nom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="enseignant" class="mb-1">Enseignant <span class="required" title="required">*</span></label>
                                        <input class="uk-input" type="text" placeholder="Enseignant" id="enseignant" name="enseignant" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="image" class="mb-1">Image <span class="required" title="required">*</span></label>
                                        <input class="form-control" id="image" type="file" name="image" required>
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
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Enseignant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td><img src="{{ asset('uploads/courses/'. $course->image) }}" alt="course image" width="50" /></td>
                                <td>{{ $course->nom }}</td>
                                <td>{{ $course->enseignant }}</td>
                                <td>
                                    <a href="{{ route('admin.course', $course->id) }}"><i class="fas fa-external-link-alt"></i></a>
                                    <a href="#" uk-toggle="target: #modal-close-default-view-{{ $course->id }}"><i class="far fa-eye"></i></a>

                                    <div id="modal-close-default-view-{{ $course->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <div>
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label for="cours" class="mb-1">Nom</label>
                                                            <input class="uk-input " type="text" placeholder="Nom du Cours" id="Cours" value="{{ $course->nom }}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="enseignant" class="mb-1">Enseignant</label>
                                                            <input class="uk-input" type="text" placeholder="Enseignant" id="enseignant" value="{{ $course->enseignant }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ asset('uploads/courses/'. $course->image) }}" alt="Cours" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" uk-toggle="target: #modal-close-default-edit-{{ $course->id }}"><i class="far fa-edit"></i></a>

                                    <div id="modal-close-default-edit-{{ $course->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('update.course', $course->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="inputs-group">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <label for="cours" class="mb-1">Nom</label>
                                                            <input class="uk-input " type="text" placeholder="Nom du Cours" id="Cours" name="nom" value="{{ $course->nom }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="enseignant" class="mb-1">Enseignant</label>
                                                                <input class="uk-input" type="text" placeholder="Enseignant" id="enseignant" value="{{ $course->enseignant }}" name="enseignant">
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="image" class="mb-1">Image</label>
                                                                <input class="form-control" id="image" type="file" name="image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 d-flex align-items-center" style="margin-top: 25px;">
                                                            <img src="{{ asset('uploads/courses/'. $course->image) }}" alt="Cours" />
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
                                    <a href="#" uk-toggle="target: #modal-close-default-delete-{{ $course->id }}"><i class="far fa-trash-alt"></i></a>

                                    <div id="modal-close-default-delete-{{ $course->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <form action="{{ route('delete.course', $course->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="inputs-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>Êtes-vous sûr Voulez-vous supprimer ce Cours ?</p>
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
            {{ $courses->links() }}
        </div>
    </div>
@endsection