@extends('admin.master.layout')
@section('title')
    Profile
@endsection
@section('current-page')
    Profile
@endsection
@section('content')
    <div class="main-users">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="px-4 px-sm-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="h5">
                                        Informations sur le profil
                                    </h3>
                        
                                    <p class="mt-1 text-muted">
                                        <span class="small">
                                            Mettez à jour les informations de profil et l'adresse e-mail de votre compte.
                                        </span>
                                    </p>
                                </div>
                        
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <form method="POST" action="{{ route('update.admin.profile') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body p-4">
                
                                    {{-- Profile Photo --}}
                                    <div class="form-group mb-3" >
                        
                                        {{-- Current Profile Photo --}}
                                        <div class="mt-2">
                                            <img src="{{ asset('uploads/images/' . $admin->profile_photo_path) }}" class="rounded-circle" width="80px" style="height: 80px; object-fit: cover">
                                        </div>
                        
                                        {{-- New Profile Photo Preview --}}
                                        <div class="mt-2" style="display: none;">
                                            <img class="rounded-circle" width="80px" height="80px">
                                        </div>

                                        <input type="file" class="form-control mt-3 mr-2" name="image" id="image" style="width: 50%">
                                                                              
                                    </div>
                                
                                    <div class="w-md-75">
                                        <!-- Name -->
                                        <div class="form-group mb-3">
                                            <label for="name" class="mb-2">Nom</label>
                                            <input class="uk-input" id="name" type="text" autocomplete="name" value="{{ $admin->name }}" name="name">
                                        </div>
                            
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="mb-2">Email</label>
                                            <input class="uk-input" id="email" type="email" value="{{ $admin->email }}" name="email">
                                        </div>
                                    </div>
                                </div>
                
                                <div class="card-footer d-flex justify-content-end">
                                    <div class="d-flex align-items-baseline">
                                        <button type="submit" class="btn btn-dark text-uppercase">
                                            mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <hr>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="px-4 px-sm-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="h5">
                                Mettre à jour le mot de passe
                            </h3>
                
                            <p class="mt-1 text-muted">
                                <span class="small">
                                    Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm">
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('changePassword') }}">
                        @csrf
                        <div class="card-body p-4">
                            <div class="w-md-75">
                                <div class="form-group mb-3">
                                    <label for="current_password" class="mb-2">Mot de passe actuel</label>
                                    <input class="uk-input" id="current_password" name="current_password" type="password" autocomplete="current-password">
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                    
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">Nouveau Mot de passe</label>
                                    <input class="uk-input" id="password" name="password" type="password" autocomplete="new-password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="password_confirmation" class="mb-2">Confirmez le Mot de passe</label>
                                    <input class="uk-input" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark text-uppercase">mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="py-3">
            <hr>
        </div> --}}
    </div>
@endsection