@extends('master.layout')
@section('title')
    Contacter Nous
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader" class="cnt">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1>Contacter Nous</h1>
                    <p>Bienvenue sur la page du Contact</p>
                </div>
            </div>
        </section>

        <section class="no-top" id="contact">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-md-2">
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
                            <h3>Avez-vous des questions?</h3>
                            
                            <form name="contactForm" id="contact_form" class="form-border" method="post" action="{{ route('contact.send') }}">
                                @csrf
                                @method('post')
                                <div class="field-set">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom & Prénom" required/>
                                </div>
            
                                <div class="field-set">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required/>
                                </div>
            
                                <div class="field-set">
                                    <input type="text" name="sujet" id="sujet" class="form-control" placeholder="Sujet" required/>
                                </div>
            
                                <div class="field-set">
                                    <textarea name="message" id="message" class="form-control" placeholder="Message" required></textarea>
                                </div>
            
                                <div id="submit">
                                    <input type="submit" id="send_message" value="Envoyer" class="btn-custom" />
                                </div>
                            </form>
                        </div>
                    
                        <div class="mb30 mt-5">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="address">
                                        <h3>Notre Bureau</h3>
                                        <address>
                                            <span><i class="fas fa-map-marker-alt"></i> Hay Hassani , Route d’essaouira. Marrakech, 40000</span>
                                            <span><i class="fas fa-phone-alt"></i>(+212) 0524-340-125</span>
                                            <span><i class="fas fa-fax"></i>(+212) 0524-342-287</span>
                                            <span><i class="far fa-envelope"></i><a href="mailto:contact.bridgens@gmail.com"> contact.bridgens@gmail.com</a></span>
                                        </address>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <iframe width="100%" style="border-radius: 10px;" height="250" src="https://maps.google.com/maps?q=ens%20marrakech&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </section>
    @include('master.footer')
@endsection