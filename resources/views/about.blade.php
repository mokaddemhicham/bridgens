@extends('master.layout')
@section('title')
    À propos de nous
@endsection
@section('content')
    @include('master.navbar')
        <section id="subheader">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1>À propos de Nous</h1>
                    <p>Quelques mots à propos de Nous</p>
                </div>
            </div>
        </section>
        <section class="no-top" id="about-us">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-md-5 wow fadeInLeft" data-wow-delay=".5s">
                        <h3>Qui Sommes Nous ?</h3>
                        <p>
                            « <b style="color: #017DFC">Bridge'ENS</b> » est un club basé à <a href="http://www.ens-marrakech.ac.ma" target="_blank" >L'école Normale Supérieure de Marrakech</a>. qui est destiné à tout étudiant au sein de l'ecole, et qui serait intéressé par le domaine informatique en général . Nous encadrons plusieurs conférences et activités .
                        </p>
                    </div>
                    <div class="col-md-6 offset-md-1 wow fadeInRight" data-wow-delay=".5s">
                        <img src="{{ asset('uploads/images/logo.png') }}" class="img-fluid" alt="">
                    </div>
                    
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5 wow fadeInRight" data-wow-delay="0s">
                        <img src="{{ asset('uploads/images/Programming-pana.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 offset-md-1 wow fadeInLeft" data-wow-delay="0s">
                        <h3>Côté développement et formations :</h3>
                        <div class="cote-dev">
                            <p>
                                <span>- Formation en outils bureautique :</span>
                                <ul>
                                    <li>Word</li>
                                    <li>Excel</li>
                                    <li>Power Point</li>
                                    <li>Access</li>
                                </ul>
                            </p>
                            <p>
                                <span>- Multimédia :</span>
                                <ul>
                                    <li>Photoshop (notions de base).</li>
                                    <li>Adobe Illustrator.</li>
                                    <li>Montage vidéo.</li>
                                </ul>
                            </p>
                            <p>
                                <span>- Développement informatique :</span>
                                <ul>
                                    <li>Création d’un site web statique.(HTML/CSS/JS)</li>
                                    <li>Architecture des ordinateurs et algèbre relationnel.</li>
                                    <li>Gestion d’une base de données (SQL).</li>
                                    <li>Création d’un site web dynamique.(HTML/CSS/JS/PHP)</li>
                                    <li>Langage C/C#.</li>
                                    <li>Programmation orientée objet.</li>
                                </ul>
                            </p>
                            <p>
                                <span>- Administration des réseaux.</span>
                                <span>- Assistance à distance (lors d’une panne).</span>
                                <span>- Préparation aux concours des grandes écoles pour les DUT informatique.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    
                    <div class="col-md-5 wow fadeInUp" data-wow-delay="0s">
                        <h3>Côté service scolaire</h3>
                        <ul>
                            <li>Création des flyers et affiches lors des forums.</li>
                            <li>Réparation et aide technique concernant les ordinateurs.</li>
                            <li>Maintenance et mise à niveau du site web de l’ENS.</li>
                            <li>Montage et triage des vidéos, photos lors des événements.</li>
                            <li>Organisation des compétitions universitaire.</li>
                            <li>Compétition de programmation dans plusieurs langages.</li>
                        </ul>
                    </div>
                    <div class="col-md-6 offset-md-1 wow fadeInUp" data-wow-delay="0s">
                        <img src="{{ asset('uploads/images/Team-pana.svg') }}" class="img-fluid" alt="">
                    </div>
                    
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5 wow fadeInRight" data-wow-delay=".5s">
                        <img src="{{ asset('uploads/images/Team goals-pana.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6  offset-md-1 wow fadeInLeft" data-wow-delay="0s">
                        <h3>Objectif </h3>
                        <ul>
                            <li>Hisser le niveau scientifique des étudiants dans le domaine informatique</li>
                            <li>Familiariser les étudiants à l’environnement informatique</li>
                            <li>Organiser des compétitions informatique en groupes</li>
                            <li>Représenter l’Université dans les différentes manifestations informatique</li>
                        </ul>
                    </div>
                    
                    
                </div>
            </div>
        
        </section>
    
        <section class="pt60 pb60 bg-color-2 text-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-sm-center text-xs-center wow fadeInUp" data-wow-delay=".5s">
                        <h3>Avez-vous d'autres questions?</h3>
                    </div>
                    
                    <div class="col-md-6 text-md-end text-sm-center text-xs-center wow fadeInUp" data-wow-delay=".5s">
                        <a href="{{ route('contact') }}" class="btn-custom">Contacter Nous</a>
                    </div>
                </div>
            </div>
        </section>
    @include('master.footer')
@endsection