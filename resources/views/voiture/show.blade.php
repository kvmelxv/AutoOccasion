@extends('layouts.app')
@section('title', 'modification véhicule')
@section('content')

<!-- une voiture -->
    <div class="d-flex flex-column justify-content-center px-5 py-4"> 
      
      <div class="row align-items-start">
        <!-- Colonne pour l'image principale -->
        <div class="col-md-6">
          @if($photos->isNotEmpty())
            <img src="{{ asset('storage/' . $photos->first()->path) }}" alt="Main Product Image" class="img-fluid mb-3 rounded">
          @endif
        </div>
        <!-- Limite à 4 images -->
        <div class="col-md-6">
          <div class="row">
            @foreach($photos as $photo)
              @if(!$loop->first && $loop->iteration <= 5)
                <div class="col-6 mb-3">
                  <img src="{{ asset('storage/' . $photo->path) }}" alt="Product Thumbnail" class="img-fluid img-mini rounded">
                </div>
              @endif
            @endforeach
          </div>
        </div>
        <!-- Images restantes -->
        <!-- <div class="col-md-12 mt-3">
          <div class="row">
            @foreach($photos as $photo)
              @if($loop->iteration > 5)
                <div class="col-3 mb-3">
                  <img src="{{ asset('storage/' . $photo->path) }}" alt="Other Image" class="img-fluid img-thumbnail">
                </div>
              @endif
            @endforeach
          </div>
        </div> -->
      </div>

          
        <!-- Description Column -->
        <!-- <div class="col-md-6" style="padding: 30px">
          <h2 class="voiture-title">{{ $voiture->modele->marque->nom}} {{ $voiture->modele->nom}} {{ $voiture->annee}}</h2>
          <h3 class="voiture-prix">{{ $voiture->prixDeVente()}} $</h3>
          <p class="lead">{{ $voiture->description[app()->getLocale()] ?? $voiture->description['fr'] }}</p>
          <a href="{{  route('ajout.panier', $voiture->id)}}" class="btn btn-primary" role="button">Ajout au Panier</a>

        </div> -->
        <!-- <div class="col-md-6">
          <div class="row img-thumbnail-row">
             
              @foreach($photos as $photo)
                @if(!$loop->first)
                  <div class="col-6">
                    <img src="{{ asset('storage/' . $photo->path) }}" alt="Product Thumbnail" class="img-fluid img-thumbnail">
                  </div>
                @endif
              @endforeach
            </div>
        </div> -->
    </div>


    <!-- table  -->
    <div class="d-flex gap-2 px-5">
      <div class="col-8 p-5 border-att">

        <h4>Détail du véhicule</h4>

        <div class="row mt-5 size">
          <div class="col-3">
            <div class="d-flex flex-column mb-3 px-2">
              <div class="d-flex align-items-center gap-1">
                <svg fill="#c01c28" width="27px" height="27px" viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#c01c28">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                  <g id="SVGRepo_iconCarrier">
                  <title/>
                  <path d="M256,62.24c-106.82,0-193.72,86.56-193.72,192.94s86.9,193,193.72,193,193.72-86.56,193.72-192.95S362.82,62.24,256,62.24Zm0,369.89c-98,0-177.72-79.38-177.72-176.95S158,78.24,256,78.24s177.72,79.38,177.72,176.94S354,432.13,256,432.13Zm127.58-103.6h0v0h0a8,8,0,0,1-10.9,2.91l-20-11.51a8,8,0,0,1,8-13.87l12.91,7.41A130.31,130.31,0,0,0,387,263.19H372.18a8,8,0,0,1,0-16H387a129.36,129.36,0,0,0-13.56-50.32l-12.87,7.4a7.91,7.91,0,0,1-4,1.07,8,8,0,0,1-4-14.94l12.8-7.35a131.91,131.91,0,0,0-37-36.83L321,159a8,8,0,0,1-13.84-8l7.39-12.75A130.71,130.71,0,0,0,264,124.73v14.76a8,8,0,0,1-16,0V124.73a130.71,130.71,0,0,0-50.56,13.5L204.83,151A8,8,0,1,1,191,159l-7.41-12.78a132,132,0,0,0-37,36.82l12.8,7.36a8,8,0,1,1-8,13.87l-12.88-7.4A129.36,129.36,0,0,0,125,247.18h14.86a8,8,0,0,1,0,16H125a130.31,130.31,0,0,0,13.53,50.33l12.9-7.41a8,8,0,1,1,8,13.87l-20,11.51a8,8,0,0,1-10.89-2.91h0l0,0h0a146.26,146.26,0,0,1-19.71-72.94c0-.14,0-.27,0-.41s0-.24,0-.36A145.42,145.42,0,0,1,128,182.59a7.54,7.54,0,0,1,.38-.75,7.25,7.25,0,0,1,.53-.79,148.09,148.09,0,0,1,52.63-52.42,7.52,7.52,0,0,1,.75-.5,8.52,8.52,0,0,1,.8-.4,146.86,146.86,0,0,1,72.51-19.25h.72a146.86,146.86,0,0,1,72.51,19.25,8.52,8.52,0,0,1,.8.4,7.52,7.52,0,0,1,.75.5,148,148,0,0,1,52.63,52.42,7.25,7.25,0,0,1,.53.79c.14.25.27.5.38.75a145.42,145.42,0,0,1,19.33,72.23c0,.12,0,.24,0,.37s0,.26,0,.4a146.26,146.26,0,0,1-19.7,72.92Zm-96.33-73.37a31.24,31.24,0,0,0-39.42-30l-27.56-47.54a8,8,0,1,0-13.84,8L234,233.15a31.09,31.09,0,0,0,22,53.14,31.5,31.5,0,0,0,8.15-1.08l5.28,9.12a8,8,0,0,0,13.84-8L278,277.22A31.13,31.13,0,0,0,287.25,255.16Zm-46.43,0a15.16,15.16,0,0,1,7.59-13.08h0a15.1,15.1,0,1,1-7.6,13.08Zm61.61,84.5H209.57a8,8,0,0,0-8,8v46.23a8,8,0,0,0,8,8h92.86a8,8,0,0,0,8-8V347.66A8,8,0,0,0,302.43,339.66Zm-8,46.23H217.57V355.66h76.86Z"/></g>
                </svg> 
                <p class="mt-3 attribut">kilométrage</p>
              </div>
              <h5 class="px-1 attribut">{{ $voiture->kilometrage}} km</h5>
            </div>

            <div class="d-flex flex-column mb-3 px-2">
              <div class="d-flex align-items-center gap-1">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                  <g id="SVGRepo_iconCarrier"> <path d="M8 9V15" stroke="#e01b24" stroke-width="1.5" stroke-linecap="round"/> 
                  <path d="M12 9V15" stroke="#e01b24" stroke-width="1.5" stroke-linecap="round"/> <path d="M8 12H13C13.9319 12 14.3978 12 14.7654 11.8478C15.2554 11.6448 15.6448 11.2554 15.8478 10.7654C16 10.3978 16 9.93188 16 9" stroke="#e01b24" stroke-width="1.5" stroke-linecap="round"/> <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="#e01b24" stroke-width="1.5"/> </g>
                </svg>
                <p class="mt-3 attribut">Transmission</p>
              </div>
              <h5 class="px-1 attribut">{{ $voiture->transmission->nom[app()->getLocale()]}}</h5>
            </div>


            <div class="d-flex flex-column px-2">
              <div class="d-flex align-items-center gap-1">
                <svg fill="#e01b24" width="23px" height="23px" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                  <g id="SVGRepo_iconCarrier"> <title>fuel-line</title> <path d="M20.12,34H5.9A2.81,2.81,0,0,1,3,31.19V4.86A2.9,2.9,0,0,1,6,2.07H20.22A2.72,2.72,0,0,1,23,4.86V31.19A2.82,2.82,0,0,1,20.12,34ZM5.9,4A.87.87,0,0,0,5,4.86V31.19a.87.87,0,0,0,.87.87H20.12a.94.94,0,0,0,.95-.87V4.86A.94.94,0,0,0,20.12,4Z" class="clr-i-outline clr-i-outline-path-1"/>
                  <path d="M29.53,34A3.5,3.5,0,0,1,26,30.5V23a2,2,0,0,0-2-2H22.57a1,1,0,0,1,0-2H24a4,4,0,0,1,4,4V30.5a1.5,1.5,0,0,0,3,0V17.3l-3.13-7A2.29,2.29,0,0,0,25.8,9h-.73a1,1,0,1,1,0-2h.73a4.3,4.3,0,0,1,3.93,2.55l3.21,7.16a1,1,0,0,1,.09.41V30.5A3.5,3.5,0,0,1,29.53,34Z" class="clr-i-outline clr-i-outline-path-2"/>
                  <path d="M18,9H8A1,1,0,1,1,8,7H18a1,1,0,0,1,0,2Z" class="clr-i-outline clr-i-outline-path-3"/>
                  <path d="M18,13H8A1,1,0,1,1,8,11H18A1,1,0,1,1,18,13Z" class="clr-i-outline clr-i-outline-path-4"/>
                  <path d="M25,12.08a1,1,0,0,1-1-1v-6a1,1,0,0,1,2,0v6A1,1,0,0,1,25,12.08Z" class="clr-i-outline clr-i-outline-path-5"/> <rect x="0" y="0" width="36" height="36" fill-opacity="0"/> </g>
                </svg>
                <p class="mt-3 attribut">Carburant</p>
              </div>
              <h5 class="px-1 attribut">{{ $voiture->carburant->nom[app()->getLocale()]}}</h5>
            </div>
          </div>

          <div class="col-3">

            <div class="d-flex flex-column px-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                  <svg fill="#e01b24" width="23px" height="23px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z"/>
                    </g>
                  </svg>
                  <p class="mt-3 attribut">Année</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->annee }}</h5>
            </div>
            <div class="d-flex flex-column px-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                  <svg fill="#e01b24" width="25px" height="25px" viewBox="0 0 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <g> <path d="M61.44,21.74c10.96,0,20.89,4.44,28.07,11.63c7.18,7.18,11.63,17.11,11.63,28.07c0,10.96-4.44,20.89-11.63,28.07 c-7.18,7.18-17.11,11.63-28.07,11.63c-10.96,0-20.89-4.44-28.07-11.63c-7.18-7.18-11.63-17.11-11.63-28.07 c0-10.96,4.44-20.89,11.63-28.07C40.55,26.19,50.48,21.74,61.44,21.74L61.44,21.74z M61.44,0c16.97,0,32.33,6.88,43.44,18 c11.12,11.12,18,26.48,18,43.44c0,16.97-6.88,32.33-18,43.44c-11.12,11.12-26.48,18-43.44,18c-16.97,0-32.33-6.88-43.44-18 C6.88,93.77,0,78.41,0,61.44C0,44.47,6.88,29.11,18,18C29.11,6.88,44.47,0,61.44,0L61.44,0z M93.47,29.41 c-8.2-8.2-19.52-13.27-32.03-13.27c-12.51,0-23.83,5.07-32.03,13.27c-8.2,8.2-13.27,19.52-13.27,32.03 c0,12.51,5.07,23.83,13.27,32.03c8.2,8.2,19.52,13.27,32.03,13.27c12.51,0,23.83-5.07,32.03-13.27c8.2-8.2,13.27-19.52,13.27-32.03 C106.74,48.93,101.67,37.61,93.47,29.41L93.47,29.41z M65.45,56.77c-1.02-1.02-2.43-1.65-4.01-1.65c-1.57,0-2.99,0.63-4.01,1.65 l-0.01,0.01c-1.02,1.02-1.65,2.43-1.65,4.01c0,1.57,0.63,2.99,1.65,4.01l0.01,0.01c1.02,1.02,2.43,1.65,4.01,1.65 c1.57,0,2.99-0.63,4.01-1.65l0.01-0.01c1.02-1.02,1.65-2.44,1.65-4.01C67.1,59.21,66.47,57.8,65.45,56.77L65.45,56.77L65.45,56.77z M65.06,50.79c1.47,0.54,2.8,1.39,3.89,2.48l0,0l0,0c0.37,0.37,0.72,0.77,1.03,1.2l0.1-0.03l21.02-5.63 c-1.63-3.83-3.98-7.28-6.88-10.17c-5.03-5.03-11.72-8.41-19.17-9.24v21.12C65.07,50.61,65.07,50.7,65.06,50.79L65.06,50.79z M72.04,61.63c-0.14,1.73-0.69,3.35-1.57,4.76c0.05,0.06,0.09,0.13,0.13,0.2l12.07,19.13c0.54-0.47,1.06-0.96,1.57-1.47 c5.83-5.83,9.44-13.9,9.44-22.8c0-1.87-0.16-3.7-0.47-5.49L72.04,61.63L72.04,61.63z M64.57,70.95c-0.99,0.31-2.04,0.47-3.13,0.47 c-0.98,0-1.93-0.13-2.84-0.38L46.82,90.19c4.39,2.24,9.36,3.5,14.62,3.5c5.46,0,10.6-1.36,15.11-3.75L64.57,70.95L64.57,70.95z M52.57,66.64c-0.92-1.38-1.52-2.99-1.7-4.71l-0.01,0l-21.09-6.6c-0.38,1.98-0.58,4.02-0.58,6.11c0,8.9,3.61,16.97,9.44,22.8 c0.63,0.63,1.29,1.24,1.98,1.82l11.8-19.19C52.47,66.8,52.52,66.72,52.57,66.64L52.57,66.64z M52.72,54.72 c0.36-0.51,0.76-1,1.21-1.44l0,0l0,0c1.05-1.04,2.31-1.87,3.71-2.41c-0.01-0.11-0.02-0.23-0.02-0.34v-21.1 c-7.38,0.87-14,4.23-18.98,9.22c-2.75,2.75-5.01,6-6.63,9.6L52.72,54.72L52.72,54.72z"/> </g> </g>
                  </svg>
                  <p class="mt-3 attribut">Motopropulseur</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->Motopropulseur->nom[app()->getLocale()]}}</h5>
            </div>
            <div class="d-flex flex-column px-2">
                <div class="d-flex align-items-center gap-2">                 
                  <svg fill="#e01b24" width="25px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M8 .5C3.58.5 0 3.86 0 8s3.58 7.5 8 7.5c4.69 0 1.04-2.83 2.79-4.55.76-.75 1.63-.87 2.44-.87.37 0 .73.03 1.06.03.99 0 1.72-.23 1.72-2.1C16 3.86 12.42.5 8 .5zm6.65 8.32c-.05.01-.16.02-.37.02-.14 0-.29 0-.45-.01-.19 0-.39-.01-.61-.01-.89 0-2.19.13-3.32 1.23-1.17 1.16-.9 2.6-.74 3.47.03.18.08.44.09.6-.16.05-.52.13-1.26.13-3.72 0-6.75-2.8-6.75-6.25S4.28 1.75 8 1.75s6.75 2.8 6.75 6.25c0 .5-.06.74-.1.82z"/>
                    <path d="M5.9 9.47c-1.03 0-1.86.8-1.86 1.79s.84 1.79 1.86 1.79 1.86-.8 1.86-1.79-.84-1.79-1.86-1.79zm0 2.35c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zm-.2-4.59c0-.99-.84-1.79-1.86-1.79s-1.86.8-1.86 1.79.84 1.79 1.86 1.79 1.86-.8 1.86-1.79zm-1.86.56c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zM7.37 2.5c-1.03 0-1.86.8-1.86 1.79s.84 1.79 1.86 1.79 1.86-.8 1.86-1.79S8.39 2.5 7.37 2.5zm0 2.35c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zm2.47 1.31c0 .99.84 1.79 1.86 1.79s1.86-.8 1.86-1.79-.84-1.79-1.86-1.79-1.86.8-1.86 1.79zm2.5 0c0 .31-.29.56-.64.56s-.64-.25-.64-.56.29-.56.64-.56.64.25.64.56z"/>
                    </g>
                  </svg>
                  <p class="mt-3 attribut">Couleur</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->couleur->nom[app()->getLocale()]}}</h5>
            </div>
          </div>

          <div class="col-3">

            <div class="d-flex flex-column px-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                  <svg fill="#e01b24" width="23px" height="23px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z"/>
                    </g>
                  </svg>
                  <p class="mt-3 attribut">Année</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->annee }}</h5>
            </div>
            <div class="d-flex flex-column px-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                  <svg fill="#e01b24" width="25px" height="25px" viewBox="0 0 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <g> <path d="M61.44,21.74c10.96,0,20.89,4.44,28.07,11.63c7.18,7.18,11.63,17.11,11.63,28.07c0,10.96-4.44,20.89-11.63,28.07 c-7.18,7.18-17.11,11.63-28.07,11.63c-10.96,0-20.89-4.44-28.07-11.63c-7.18-7.18-11.63-17.11-11.63-28.07 c0-10.96,4.44-20.89,11.63-28.07C40.55,26.19,50.48,21.74,61.44,21.74L61.44,21.74z M61.44,0c16.97,0,32.33,6.88,43.44,18 c11.12,11.12,18,26.48,18,43.44c0,16.97-6.88,32.33-18,43.44c-11.12,11.12-26.48,18-43.44,18c-16.97,0-32.33-6.88-43.44-18 C6.88,93.77,0,78.41,0,61.44C0,44.47,6.88,29.11,18,18C29.11,6.88,44.47,0,61.44,0L61.44,0z M93.47,29.41 c-8.2-8.2-19.52-13.27-32.03-13.27c-12.51,0-23.83,5.07-32.03,13.27c-8.2,8.2-13.27,19.52-13.27,32.03 c0,12.51,5.07,23.83,13.27,32.03c8.2,8.2,19.52,13.27,32.03,13.27c12.51,0,23.83-5.07,32.03-13.27c8.2-8.2,13.27-19.52,13.27-32.03 C106.74,48.93,101.67,37.61,93.47,29.41L93.47,29.41z M65.45,56.77c-1.02-1.02-2.43-1.65-4.01-1.65c-1.57,0-2.99,0.63-4.01,1.65 l-0.01,0.01c-1.02,1.02-1.65,2.43-1.65,4.01c0,1.57,0.63,2.99,1.65,4.01l0.01,0.01c1.02,1.02,2.43,1.65,4.01,1.65 c1.57,0,2.99-0.63,4.01-1.65l0.01-0.01c1.02-1.02,1.65-2.44,1.65-4.01C67.1,59.21,66.47,57.8,65.45,56.77L65.45,56.77L65.45,56.77z M65.06,50.79c1.47,0.54,2.8,1.39,3.89,2.48l0,0l0,0c0.37,0.37,0.72,0.77,1.03,1.2l0.1-0.03l21.02-5.63 c-1.63-3.83-3.98-7.28-6.88-10.17c-5.03-5.03-11.72-8.41-19.17-9.24v21.12C65.07,50.61,65.07,50.7,65.06,50.79L65.06,50.79z M72.04,61.63c-0.14,1.73-0.69,3.35-1.57,4.76c0.05,0.06,0.09,0.13,0.13,0.2l12.07,19.13c0.54-0.47,1.06-0.96,1.57-1.47 c5.83-5.83,9.44-13.9,9.44-22.8c0-1.87-0.16-3.7-0.47-5.49L72.04,61.63L72.04,61.63z M64.57,70.95c-0.99,0.31-2.04,0.47-3.13,0.47 c-0.98,0-1.93-0.13-2.84-0.38L46.82,90.19c4.39,2.24,9.36,3.5,14.62,3.5c5.46,0,10.6-1.36,15.11-3.75L64.57,70.95L64.57,70.95z M52.57,66.64c-0.92-1.38-1.52-2.99-1.7-4.71l-0.01,0l-21.09-6.6c-0.38,1.98-0.58,4.02-0.58,6.11c0,8.9,3.61,16.97,9.44,22.8 c0.63,0.63,1.29,1.24,1.98,1.82l11.8-19.19C52.47,66.8,52.52,66.72,52.57,66.64L52.57,66.64z M52.72,54.72 c0.36-0.51,0.76-1,1.21-1.44l0,0l0,0c1.05-1.04,2.31-1.87,3.71-2.41c-0.01-0.11-0.02-0.23-0.02-0.34v-21.1 c-7.38,0.87-14,4.23-18.98,9.22c-2.75,2.75-5.01,6-6.63,9.6L52.72,54.72L52.72,54.72z"/> </g> </g>
                  </svg>
                  <p class="mt-3 attribut">Motopropulseur</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->Motopropulseur->nom[app()->getLocale()]}}</h5>
            </div>
            <div class="d-flex flex-column px-2">
                <div class="d-flex align-items-center gap-2">                 
                  <svg fill="#e01b24" width="25px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M8 .5C3.58.5 0 3.86 0 8s3.58 7.5 8 7.5c4.69 0 1.04-2.83 2.79-4.55.76-.75 1.63-.87 2.44-.87.37 0 .73.03 1.06.03.99 0 1.72-.23 1.72-2.1C16 3.86 12.42.5 8 .5zm6.65 8.32c-.05.01-.16.02-.37.02-.14 0-.29 0-.45-.01-.19 0-.39-.01-.61-.01-.89 0-2.19.13-3.32 1.23-1.17 1.16-.9 2.6-.74 3.47.03.18.08.44.09.6-.16.05-.52.13-1.26.13-3.72 0-6.75-2.8-6.75-6.25S4.28 1.75 8 1.75s6.75 2.8 6.75 6.25c0 .5-.06.74-.1.82z"/>
                    <path d="M5.9 9.47c-1.03 0-1.86.8-1.86 1.79s.84 1.79 1.86 1.79 1.86-.8 1.86-1.79-.84-1.79-1.86-1.79zm0 2.35c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zm-.2-4.59c0-.99-.84-1.79-1.86-1.79s-1.86.8-1.86 1.79.84 1.79 1.86 1.79 1.86-.8 1.86-1.79zm-1.86.56c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zM7.37 2.5c-1.03 0-1.86.8-1.86 1.79s.84 1.79 1.86 1.79 1.86-.8 1.86-1.79S8.39 2.5 7.37 2.5zm0 2.35c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zm2.47 1.31c0 .99.84 1.79 1.86 1.79s1.86-.8 1.86-1.79-.84-1.79-1.86-1.79-1.86.8-1.86 1.79zm2.5 0c0 .31-.29.56-.64.56s-.64-.25-.64-.56.29-.56.64-.56.64.25.64.56z"/>
                    </g>
                  </svg>
                  <p class="mt-3 attribut">Couleur</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->couleur->nom[app()->getLocale()]}}</h5>
            </div>
          </div>

          <div class="col-3">

            <div class="d-flex flex-column px-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                  <svg fill="#e01b24" width="23px" height="23px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z"/>
                    </g>
                  </svg>
                  <p class="mt-3 attribut">Année</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->annee }}</h5>
            </div>
            <div class="d-flex flex-column px-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                  <svg fill="#e01b24" width="25px" height="25px" viewBox="0 0 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <g> <path d="M61.44,21.74c10.96,0,20.89,4.44,28.07,11.63c7.18,7.18,11.63,17.11,11.63,28.07c0,10.96-4.44,20.89-11.63,28.07 c-7.18,7.18-17.11,11.63-28.07,11.63c-10.96,0-20.89-4.44-28.07-11.63c-7.18-7.18-11.63-17.11-11.63-28.07 c0-10.96,4.44-20.89,11.63-28.07C40.55,26.19,50.48,21.74,61.44,21.74L61.44,21.74z M61.44,0c16.97,0,32.33,6.88,43.44,18 c11.12,11.12,18,26.48,18,43.44c0,16.97-6.88,32.33-18,43.44c-11.12,11.12-26.48,18-43.44,18c-16.97,0-32.33-6.88-43.44-18 C6.88,93.77,0,78.41,0,61.44C0,44.47,6.88,29.11,18,18C29.11,6.88,44.47,0,61.44,0L61.44,0z M93.47,29.41 c-8.2-8.2-19.52-13.27-32.03-13.27c-12.51,0-23.83,5.07-32.03,13.27c-8.2,8.2-13.27,19.52-13.27,32.03 c0,12.51,5.07,23.83,13.27,32.03c8.2,8.2,19.52,13.27,32.03,13.27c12.51,0,23.83-5.07,32.03-13.27c8.2-8.2,13.27-19.52,13.27-32.03 C106.74,48.93,101.67,37.61,93.47,29.41L93.47,29.41z M65.45,56.77c-1.02-1.02-2.43-1.65-4.01-1.65c-1.57,0-2.99,0.63-4.01,1.65 l-0.01,0.01c-1.02,1.02-1.65,2.43-1.65,4.01c0,1.57,0.63,2.99,1.65,4.01l0.01,0.01c1.02,1.02,2.43,1.65,4.01,1.65 c1.57,0,2.99-0.63,4.01-1.65l0.01-0.01c1.02-1.02,1.65-2.44,1.65-4.01C67.1,59.21,66.47,57.8,65.45,56.77L65.45,56.77L65.45,56.77z M65.06,50.79c1.47,0.54,2.8,1.39,3.89,2.48l0,0l0,0c0.37,0.37,0.72,0.77,1.03,1.2l0.1-0.03l21.02-5.63 c-1.63-3.83-3.98-7.28-6.88-10.17c-5.03-5.03-11.72-8.41-19.17-9.24v21.12C65.07,50.61,65.07,50.7,65.06,50.79L65.06,50.79z M72.04,61.63c-0.14,1.73-0.69,3.35-1.57,4.76c0.05,0.06,0.09,0.13,0.13,0.2l12.07,19.13c0.54-0.47,1.06-0.96,1.57-1.47 c5.83-5.83,9.44-13.9,9.44-22.8c0-1.87-0.16-3.7-0.47-5.49L72.04,61.63L72.04,61.63z M64.57,70.95c-0.99,0.31-2.04,0.47-3.13,0.47 c-0.98,0-1.93-0.13-2.84-0.38L46.82,90.19c4.39,2.24,9.36,3.5,14.62,3.5c5.46,0,10.6-1.36,15.11-3.75L64.57,70.95L64.57,70.95z M52.57,66.64c-0.92-1.38-1.52-2.99-1.7-4.71l-0.01,0l-21.09-6.6c-0.38,1.98-0.58,4.02-0.58,6.11c0,8.9,3.61,16.97,9.44,22.8 c0.63,0.63,1.29,1.24,1.98,1.82l11.8-19.19C52.47,66.8,52.52,66.72,52.57,66.64L52.57,66.64z M52.72,54.72 c0.36-0.51,0.76-1,1.21-1.44l0,0l0,0c1.05-1.04,2.31-1.87,3.71-2.41c-0.01-0.11-0.02-0.23-0.02-0.34v-21.1 c-7.38,0.87-14,4.23-18.98,9.22c-2.75,2.75-5.01,6-6.63,9.6L52.72,54.72L52.72,54.72z"/> </g> </g>
                  </svg>
                  <p class="mt-3 attribut">Motopropulseur</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->Motopropulseur->nom[app()->getLocale()]}}</h5>
            </div>
            <div class="d-flex flex-column px-2">
                <div class="d-flex align-items-center gap-2">                 
                  <svg fill="#e01b24" width="25px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M8 .5C3.58.5 0 3.86 0 8s3.58 7.5 8 7.5c4.69 0 1.04-2.83 2.79-4.55.76-.75 1.63-.87 2.44-.87.37 0 .73.03 1.06.03.99 0 1.72-.23 1.72-2.1C16 3.86 12.42.5 8 .5zm6.65 8.32c-.05.01-.16.02-.37.02-.14 0-.29 0-.45-.01-.19 0-.39-.01-.61-.01-.89 0-2.19.13-3.32 1.23-1.17 1.16-.9 2.6-.74 3.47.03.18.08.44.09.6-.16.05-.52.13-1.26.13-3.72 0-6.75-2.8-6.75-6.25S4.28 1.75 8 1.75s6.75 2.8 6.75 6.25c0 .5-.06.74-.1.82z"/>
                    <path d="M5.9 9.47c-1.03 0-1.86.8-1.86 1.79s.84 1.79 1.86 1.79 1.86-.8 1.86-1.79-.84-1.79-1.86-1.79zm0 2.35c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zm-.2-4.59c0-.99-.84-1.79-1.86-1.79s-1.86.8-1.86 1.79.84 1.79 1.86 1.79 1.86-.8 1.86-1.79zm-1.86.56c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zM7.37 2.5c-1.03 0-1.86.8-1.86 1.79s.84 1.79 1.86 1.79 1.86-.8 1.86-1.79S8.39 2.5 7.37 2.5zm0 2.35c-.35 0-.64-.25-.64-.56s.29-.56.64-.56.64.25.64.56-.29.56-.64.56zm2.47 1.31c0 .99.84 1.79 1.86 1.79s1.86-.8 1.86-1.79-.84-1.79-1.86-1.79-1.86.8-1.86 1.79zm2.5 0c0 .31-.29.56-.64.56s-.64-.25-.64-.56.29-.56.64-.56.64.25.64.56z"/>
                    </g>
                  </svg>
                  <p class="mt-3 attribut">Couleur</p>
                </div>
                <h5 class="px-1 attribut">{{ $voiture->couleur->nom[app()->getLocale()]}}</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 p-5">
        <div class="d-flex flex-column gap-1 mb-3">
          <h4 class="voiture-title">{{ $voiture->modele->marque->nom}} {{ $voiture->modele->nom}} {{ $voiture->annee}}</h4>
          <h3 class="voiture-prix">{{ $voiture->prixDeVente()}} $</h3>
        </div>
        
        <p class="lead">{{ $voiture->description[app()->getLocale()] ?? $voiture->description['fr'] }}</p>
       
        <div class="d-flex flex-column gap-2">
          <a href="{{  route('ajout.panier', $voiture->id)}}" class="btn btn-primary btn-ckeckout" role="button">Ajout au Panier</a>
          <a href="{{  route('ajout.panier', $voiture->id)}}" class="btn btn-primary btn-routier" role="button">Réserver un éssaie routier</a>
        </div>
        
      </div>


    </div>
    
    <!-- fin table -->

  @endsection