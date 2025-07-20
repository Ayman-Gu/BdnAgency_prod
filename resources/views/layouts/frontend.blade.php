<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Default Site Title')</title>

  <meta name="description" content="@yield('meta_description', 'Default description for the site')" />
  <meta name="keywords" content="@yield('meta_keywords', 'default, keywords, here')" />
  <!-- Ajoute ici d'autres CSS si besoin -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- icons-->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Vendor CSS Files (with asset()) -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  
  <!-- Main CSS File (with asset()) -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  
  @livewireStyles


</head>
<body>

  {{-- Header --}}
<header id="header" class="header d-flex align-items-center fixed-top">
 <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

   <a href="{{ route('index') }}" class="logo d-flex align-items-center">
     <div class="sitename">
       <img src="{{asset('assets/img/hero/1.png')}}" class="header-logo" />
     </div>
   </a>

   <nav id="navmenu" class="navmenu">
     <ul>
       <li><a href="/#hero">Accueil</a></li>
       <li><a href="{{ route('a-propos') }}">À propos</a></li>
       <li class="dropdown"><a href="/#services"><span>Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
         <ul>
           <li><a href="{{ route('serviceEmailing') }}">Plateforme Emailing</a></li>
           <li><a href="{{ route('serviceSMS') }}">Plateforme SMS</a></li>
           <li><a href="{{ route('serviceBDD') }}">Base de données</a></li>
           <li><a href="{{ route('serviceNewsletter') }}">Gestion des Newsletters</a></li>
           <li><a href="{{ route('serviceVisionnaire') }}">Le Visionnaire</a></li>
           <li><a href="{{ route('serviceBranding') }}">Branding & Identité Visuelle</a></li>
         </ul>
       </li>
       <!--<li><a href="/#nosTarifs">Tarifs</a></li>-->
       <li><a href="/#portfolio">Projets</a></li>
       <!--<li><a href="/#team">Équipe</a></li>-->
       <li><a href="{{route('page.blog')}}">Blog</a></li>
       <li><a href="/#contact">Contact</a></li>
       <li>
           <a href="#" class="user-icon-wrapper group text-white ms-2">
               Kit Media
           </a>
       </li>
    

       <!-- User is logged in: link to profile 
       @auth
           
           <li>
               <a href="{{ route('profile.edit') }}" class="user-icon-wrapper group">
                   <i class="bi bi-person-circle user-icon"></i>
               </a>
           </li>
       @else
           <li>
               <a href="/login" class="user-icon-wrapper group">
                   <i class="bi bi-person-circle user-icon"></i>
               </a>
           </li>
       @endauth-->
     </ul>
     <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
   </nav>
 </div>
</header>

    {{-- Main Content --}}
    <main>
        @yield('mainContent')
    </main>

    {{-- Footer --}}
<footer id="footer" class="footer dark-background">
    <div class="container">
     
      <div class="footer-content py-5">
        <div class="first-div">
          <div class="footer-logo">
            <img src="{{asset('assets/img/footer/2.png')}}" class="footer-logo-img" alt="Selecao Logo">
          </div>
          <div class="description">
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, sint alias. </div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, sint alias. </div>
          </div>
        </div>
        <div class="third-div ms-lg-5">
          <div class="title">
            OUR SITEMAP
          </div>
          <div class="links">
            <div class="left-links">
               <a href="{{ route('serviceEmailing') }}"><i class="bi bi-chevron-right"></i>Plateforme Emailing</a>
               <a href="{{ route('serviceSMS') }}"><i class="bi bi-chevron-right"></i>Plateforme SMS</a>
               <a href="{{ route('serviceBDD') }}"><i class="bi bi-chevron-right"></i>Base de données</a>
            </div>
             <div class="right-links">
                <a href="{{ route('serviceNewsletter') }}"><i class="bi bi-chevron-right"></i>Gestion des Newsletters</a>
                <a href="{{ route('serviceVisionnaire') }}"><i class="bi bi-chevron-right"></i>Le Visionnaire</a>
                <a href="{{ route('serviceBranding') }}"><i class="bi bi-chevron-right"></i>Branding & Identité Visuelle</a>
                <a href="/#contact"><i class="bi bi-chevron-right"></i>Se désaboner</a>
                <a href="{{ asset('assets/pdf/note-legale.pdf') }}" target="_blank"><i class="bi bi-chevron-right"></i>Note légale</a>
            </div>
          </div>
        </div>
        <div class="fourth-div">
          <div class="title">
            Newsletter
          </div>
          <div class="description">
            Sign up for our newsletter to get the latest news and updates.
          </div>

            @livewire('footer-newsletter', [], key('footer-newsletter'))


            <div class="social-links d-flex align-items-center gap-1 mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-skype"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="description fw-bold">
              Déclaration CNDP N° : XXX-XX-XXXX
            </div>
        </div>
      </div>

      <div class="container align-items-center flex-wrap copyright text-center">
        <div class="mb-3 mb-md-0">
          <span>Copyright</span> 
          <strong class="px-1 sitename">BDN AGENCY</strong> 
          <span>All Rights Reserved</span>
        </div>
      </div>

    </div>
  </footer>
 <!-- Vendor JS Files -->
 <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
 <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
 <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
 
 <!-- Main JS File -->
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="{{ asset('assets/js/filter-pricing.js') }}"></script>
 

 @livewireScripts


</body>
</html>