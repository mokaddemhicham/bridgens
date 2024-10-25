<footer class="footer-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0s">
                <div class="widget" >
                    <a href="index.html"><img alt="logo" width="150px" src="{{ asset('uploads/images/logo.png') }}" ></a>
                    <p>Le club des « Bridge'ENS » exploitera les connaissances des différents étudiants de notre école, notamment les anciens étudiants qui offriront une formation dans les différents langages ou logiciels ainsi que les concepts informatique.</p>
                </div>
            </div>
            
            <div class="col-lg-4 d-flex justify-content-lg-center wow fadeInUp" data-wow-delay=".25s">
                <div class="widget">
                    <h5>Pages</h5>
                    <ul>
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li><a href="{{ route('events') }}">Evénements</a></li>
                        <li><a href="{{ route('formations') }}">Formations</a></li>
                        <li><a href="{{ route('courses') }}">Cours</a></li>
                        <li><a href="{{ route('team') }}">Membres</a></li>
                        <li><a href="{{ route('about') }}">À propos de nous</a></li>
                        <li><a href="{{ route('contact') }}">Contacter Nous</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                <div class="widget">
                    <h5>Page Facebook</h5>

                    <div class="fb-page" data-href="https://www.facebook.com/bridge.ens/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/bridge.ens/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bridge.ens/">Bridge ENS</a></blockquote></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-delay="0s" >
                <div class="mt10 copyright">© Copyright <span id="current-year"></span> - Developed by <a href="https://mokaddemhicham.ma" target="_blank">Hicham Mokaddem</a> </div>
            </div>

            <div class="col-md-6 wow fadeInRight" data-wow-delay="0s" style="text-align: right;">
                <div class="social-icons">
                    <a href="https://www.facebook.com/bridge.ens" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/bridge.ens" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/bridgens"><i class="fab fa-linkedin" target="_blank"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g" target="_blank"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div id="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div class="scrollToTop"><i class="fas fa-chevron-up"></i></div>
</footer>
<script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>