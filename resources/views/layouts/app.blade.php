<!doctype html>
<html lang="en"> <!-- Hyua785@ -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Balise meta pour le jeton CSRF -->
  <title>Auto Occasions</title>
  <!-- Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Auto Ocassions CSS-->
  <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}">
  <!-- Aos Animation-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Box Icons css-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
  <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
          <a class="navbar-brand col-lg-3 me-0" href="{{ route('home') }}"><span>Auto</span>ccasion</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
              @guest
              <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">@lang('lang.text_home')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.voiture')}}" class="nav-link">@lang('lang.text_cars')</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">@lang('lang.text_about')</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">@lang('lang.text_contact')</a>
              </li>
              @else
              <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">@lang('lang.text_home')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.voiture')}}" class="nav-link">@lang('lang.text_cars')</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">A propos</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li>
              @cannot('edit-role')
              @can('edit-car')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Section Employé</a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('liste-crm.voiture')}}" class="dropdown-item">Liste Des Véhicules</a></li>
                  <li><a href="{{ route('create.voiture')}}" class="dropdown-item">Ajouter Un Véhicule</a></li>
                  </ul>
              </li>
              @endcan 
              @endcannot
              @can('edit-role')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Section Admin</a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('create.voiture')}}" class="dropdown-item">@lang('lang.text_add_vehicle')</a></li>
                  <li><a href="{{ route('liste-crm.voiture')}}" class="dropdown-item">Gestion des Véhicules</a></li>
                  <li><a href="{{ route('users')}}" class="dropdown-item">Gestion Des Utilisateurs</a></li>
                  <li><a href="{{ route('commande.index')}}" class="dropdown-item">Gestion des Commandes</a></li>
                  <li><a href="{{ route('marque.index') }}" class="dropdown-item">Gestion des Marques</a></li>
                  <li><a href="{{ route('modele.index') }}" class="dropdown-item">Gestion des Modeles</a></li>
                  <li><a href="{{ route('transmission.index') }}" class="dropdown-item">Gestion des Transmissions</a></li>
                  <li><a href="{{ route('carburant.index') }}" class="dropdown-item">Gestion des Carburants</a></li>
                  <li><a href="{{ route('motopropulseur.index') }}" class="dropdown-item">Gestion des Motopropulseurs</a></li>
                  <li><a href="{{ route('couleur.index') }}" class="dropdown-item">Gestion des Couleurs</a></li>
                </ul>
              </li>
              @endcan
              <li class="nav-item dropdown">
              @endcan
              </li>
            </ul>

            <div class="d-lg-flex col-lg-3 justify-content-lg-end gap-4">
              @guest
              <!-- Section compte -->
              <div class="d-lg-flex col-lg-1 justify-content-lg-end">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('lang.text_account')</a>
                  <ul class="dropdown-menu">
                    <a href="{{ route('user.create')}}" class="dropdown-item">@lang('lang.text_registration')</a>
                    <a href="{{ route('login')}}" class="dropdown-item">@lang('lang.text_login')</a>
                  </ul>
                </li>
              </div>
              @else
              <!-- Section profil -->
              <div class="d-lg-flex col-lg-1 justify-content-lg-end">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('lang.text_profile')</a>
                  <ul class="dropdown-menu">
                    <a  href="{{ route('user.show', Auth::user()->id) }}" class="dropdown-item">@lang('lang.text_profile_show')</a>
                    <a href="{{ route('logout')}}" class="dropdown-item">@lang('lang.text_logout')</a>
                  </ul>
                </li>
              </div>
              @endguest
              <!-- Section langues -->
              <div class="d-lg-flex col-lg-0 justify-content-lg-end"> 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('lang.text_languages')</a>
                  <ul class="dropdown-menu">
                    <a href="{{ route('lang', 'en') }}" class="dropdown-item">En</a>
                    <a href="{{ route('lang', 'fr') }}" class="dropdown-item">Fr</a>
                  </ul>
                </li>
              </div>
              <li class="nav-item d-flex">
                <a href="{{ route('show.panier') }}" class="d-flex align-items-center">
                  <div class="d-flex align-items-center gap-1">
                    <i class="fa-solid fa-cart-shopping fa-lg mr-1"></i>
                    <span class="cart-count">{{ session('panier') ? '(' . count(session('panier')) . ')' : '' }}</span>
                  </div>
                </a>
              </li>
            </div>
          </div>
        </div>
  </nav>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <main>
    @yield('content')
  </main>

  <!--====== FOOTER ONE PART START ======-->
<footer class="footer-area footer-one">
   <div class="footer-widget">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-4 col-sm-12">
               <div class="f-about">
                  <div class="footer-logo">
                     <a href="javascript:void(0)">
                     <img src="https://cdn.ayroui.com/1.0/images/footer/logo.svg" alt="Logo" />
                     </a>
                  </div>
                  <p class="text">
                     Lorem Ipsum is simply dummy text of the printing and
                     typesetting industry.
                  </p>
               </div>
               <div class="footer-app-store">
                  <h5 class="download-title">Download Our App Now!</h5>
                  <ul>
                     <li>
                        <a href="javascript:void(0)">
                        <img
                           src="https://cdn.ayroui.com/1.0/images/footer/app-store.svg"
                           alt="app"
                           />
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <img
                           src="https://cdn.ayroui.com/1.0/images/footer/play-store.svg"
                           alt="play"
                           />
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-sm-4">
               <div class="footer-link">
                  <h6 class="footer-title">Company</h6>
                  <ul>
                     <li><a href="javascript:void(0)">About</a></li>
                     <li><a href="javascript:void(0)">Contact</a></li>
                     <li><a href="javascript:void(0)">Marketing</a></li>
                     <li><a href="javascript:void(0)">Awards</a></li>
                  </ul>
               </div>
               <!-- footer link -->
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-4">
               <div class="footer-link">
                  <h6 class="footer-title">Services</h6>
                  <ul>
                     <li><a href="javascript:void(0)">Products</a></li>
                     <li><a href="javascript:void(0)">Business</a></li>
                     <li><a href="javascript:void(0)">Developer</a></li>
                     <li><a href="javascript:void(0)">Insights</a></li>
                  </ul>
               </div>
               <!-- footer link -->
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-4">
               <!-- Start Footer Contact -->
               <div class="footer-contact">
                  <h6 class="footer-title">Help & Suuport</h6>
                  <ul>
                     <li>
                        <i class="lni lni-map-marker"></i> Madison Street, NewYork,
                        USA
                     </li>
                     <li><i class="lni lni-phone-set"></i> +88 556 88545</li>
                     <li><i class="lni lni-envelope"></i> support@ayroui.com</li>
                  </ul>
               </div>
               <!-- End Footer Contact -->
            </div>
         </div>
         <!-- row -->
      </div>
      <!-- container -->
   </div>
   <!-- footer widget -->
   <div class="footer-copyright">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div
                  class="
                  copyright
                  text-center
                  d-md-flex
                  justify-content-between
                  align-items-center
                  "
                  >
                  <p class="text">Copyright © 2024 AyroUI. All Rights Reserved</p>
                  <ul class="social">
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-facebook-filled"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-twitter-original"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-instagram-filled"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)"
                           ><i class="lni lni-linkedin-original"></i
                           ></a>
                     </li>
                  </ul>
               </div>
               <!-- copyright -->
            </div>
         </div>
         <!-- row -->
      </div>
      <!-- container -->
   </div>
   <!-- footer copyright -->
</footer>
<!--====== FOOTER ONE PART ENDS ======-->
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Link to Js -->
  <script src="{{ asset('/assets/js/main.js') }}"></script>
  <script src="{{ asset('/assets/js/paiement_modes.js') }}"></script>
  <script src="{{ asset('/assets/js/SelectMarque.js') }}"></script>
  <script src="{{ asset('/assets/js/FiltreAnimation.js') }}"></script>
  <script src="{{ asset('/assets/js/FiltreSelect.js') }}"></script>
  <script src="{{ asset('/assets/js/DeleteImg.js') }}"></script>
  <script src="{{ asset('/assets/js/FiltreResults.js') }}"></script>
  <script src="{{ asset('/assets/js/FiltreResultsCrm.js') }}"></script>
<!--<link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}"> -->

@yield('scripts')

</body>
</html>