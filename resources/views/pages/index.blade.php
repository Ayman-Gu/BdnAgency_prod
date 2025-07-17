@extends('layouts.frontend')
@section('mainContent')

@section('title', 'Service d\'e-mail marketing | BDN Agency')
@section('meta_description', 'Créez une identité de marque forte et mémorable grâce à nos services de branding et d’identité visuelle : logo, charte graphique, stratégie de marque et design créatif.')
@section('meta_keywords', 'branding, identité visuelle, création logo, charte graphique, image de marque, design, stratégie de marque, BDN Agency')



<style>
    /* Add margin-top to the first visible section after hero*/
    .first-section-margin {
        margin-top: 90px !important;
    }
</style>
@php
    $showHero = !empty($sections['hero_section']) && $sections['hero_section'] == 1;

    $sectionOrder = [
        'hero_section',
        'about_section',
        'features_section',
        'cta_section',
        'services_section',
        'portfolio_section',
        'testimonials_section',
        'pricing_section',
        'faq_section',
        'team_section',
        'recentposts_section',
        'contact_section',
    ];

    // Find first visible section after hero (or first visible if no hero)
    $firstSection = null;

    foreach ($sectionOrder as $key) {
        if ($key === 'hero_section' && $showHero) {
            continue;
        }
        if (!empty($sections[$key]) && $sections[$key] == 1) {
            $firstSection = $key;
            break;
        }
    }
@endphp

   <main class="main">

    <!-- Hero Section -->
 @if($showHero)

    <section id="hero" class="hero section bg-image text-white">

  <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade position-relative" data-bs-ride="carousel">
    <!-- Slides -->
    <div class="carousel-inner mt-5">
    <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="custom-carousel-container">
              <div class="carousel-content-wrapper" style="gap:0px;">
                <div class="carousel-text-content" style="margin-top: 50px;">
                  <h2 class="animate__animated animate__fadeInDown hero-h2" style="font-size: 30px;">
                    Votre Partenaire Expert en Marketing Email & SMS au Maroc
                  </h2>
                  <p class="hero-p hero-p--slide2 animate__animated animate__fadeInLeft">
                    Boostez votre communication directe grâce à des stratégies sur-mesure, conçues pour générer des résultats concrets :<strong> Plus de clics, plus de conversions, plus de clients — le tout dans le conforme des normes CNDP. </strong>
                  </p>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInLeft scrollto">En savoir plus</a>
                </div>
                <div class="carousel-image-wrapper">
                  <img 
                    src="assets/img/hero/right-image.png" 
                    alt="Image" 
                    class="carousel-image animate__animated animate__fadeInRight"
                  >
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2-->
          <div class="carousel-item ">
            <div class="custom-carousel-container">
              <div class="carousel-content-wrapper" style="gap:0px;">
                <div class="carousel-text-content" style="margin-top: 50px;">
                  <h2 class="animate__animated animate__fadeInDown hero-h2" style="font-size: 30px;">
                    Engagez votre audience avec un style de newsletter Premium
                  </h2>
                  <p class="hero-p hero-p--slide2 animate__animated animate__fadeInLeft">
                    Nous créons des newsletters sur mesure qui captivent, fidélisent et valorisent votre marque, semaine après semaine.
                  </p>

                  <a href="#about" class="btn-get-started animate__animated animate__fadeInLeft scrollto">En savoir plus</a>
                </div>
                <div class="carousel-image-wrapper">
                  <img 
                    src="assets/img/hero/right-image.png" 
                    alt="Image" 
                    class="carousel-image animate__animated animate__fadeInRight"
                  >
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="custom-carousel-container">
              <div class="carousel-content-wrapper" style="gap:0px;">
                <div class="carousel-text-content" style="margin-top: 50px;">
                  <h2 class="animate__animated animate__fadeInDown hero-h2" style="font-size: 30px;">
                    Automatisez. Analysez. Gagnez avec des outils puissants pour des résultats mesurables
                  </h2>
                  <p class="hero-p hero-p--slide2 animate__animated animate__fadeInLeft">
                    Grâce à nos outils et tableaux de bord, suivez vos performances en temps réel et optimisez vos campagnes en toute simplicité, avec une délivrabilité optimale grâce à nos IP dédiées et notre expertise.
                  </p>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInLeft scrollto">En savoir plus</a>
                </div>
                <div class="carousel-image-wrapper">
                  <img 
                    src="assets/img/hero/right-image.png" 
                    alt="Image" 
                    class="carousel-image animate__animated animate__fadeInRight"
                  >
                </div>
              </div>
            </div>
          </div>
    </div>

     <!-- Only show on mobile/tablet -->
       <div class="carousel-indicators justify-content-center">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class=""></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" class=""></button>
      </div>

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->
@endif

    <!-- About Section -->
@if(!empty($sections['about_section']) && $sections['about_section'] == 1)

    <section id="about" class="about section {{ (!$showHero && $firstSection === 'about_section') ? 'first-section-margin' : '' }}">

      <!-- Section Title -->
      <div class="container section-title mt-5" data-aos="fade-up" style="margin-top: 70px !important;">
        <h2>À PROPOS</h2>
        <p class="mt-4 mb-3">Qui sommes-nous</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row mt-4 gx-5">

          <div class="col-lg-7 content" data-aos="fade-up" data-aos-delay="100">
            <p style="text-align:justify">
             <strong>BDN Agency</strong>, votre booster de communication directe, est une agence spécialisée dans la création de stratégies d’emailing sur-mesure. Nous gérons vos campagnes de newsletters pour vous aider à communiquer efficacement avec vos clients et transformer l’attention en action. On ne vend pas du rêve. On crée des campagnes qui parlent à vos clients et génèrent des résultats concrets.
            </p>
            <ul class="custom-list">
              <li>
                <div class="icon-block"><i class="bi bi-check2-circle"></i></div>
                <div class="text-block">
                  Emailings qui cliquent, SMS qui convertissent, newsletters qui fidélisent.
                </div>
              </li>
              <li>
                <div class="icon-block"><i class="bi bi-check2-circle"></i></div>
                <div class="text-block">
                  Des messages clairs, des visuels stylés et une stratégie alignée à vos objectifs.
                </div>
              </li>
              <li>
                <div class="icon-block"><i class="bi bi-check2-circle"></i></div>
                <div class="text-block">
                  Une base de données clean, des envois conformes CNDP, et une délivrabilité au top.
                </div>
              </li>
            </ul>
          </div>

          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
            <p>Notre mission ? Vous connecter à vos clients de façon simple, directe, efficace.</p>
            <a href="{{ route('a-propos') }}" class="read-more"><span>En savoir plus</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->
@endif

    <!-- Features Section -->
@if(!empty($sections['features_section']) && $sections['features_section'] == 1)

    <section id="features" class="features section {{(!$showHero && $firstSection === 'features_section') ? 'first-section-margin' : '' }}">

      <div class="container mt-5">

        <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100" style="margin-top: 17px;">
          <li class="nav-item col-3">
            <a class="nav-link active show gap-3" data-bs-toggle="tab" data-bs-target="#features-tab-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-icon lucide-book-open"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
              <h4 class="d-none d-lg-block">Histoire</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link gap-3" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target-icon lucide-target"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>  
                <h4 class="d-none d-lg-block">Nos valeurs</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link gap-3" data-bs-toggle="tab" data-bs-target="#features-tab-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-handshake-icon lucide-handshake"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/></svg>              
              <h4 class="d-none d-lg-block">Notre mission</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link gap-2" data-bs-toggle="tab" data-bs-target="#features-tab-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb-icon lucide-lightbulb"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
              <h4 class="d-none d-lg-block">Innovation</h4>
            </a>
          </li>
        </ul><!-- End Tab Nav -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row mt-3">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3 class="mt-3">Le début d'une vision ambitieuse, guidée par la passion.</h3>
                <p class="mt-4">
                 <strong>BDN Agency</strong>  a vu le jour à partir d’un besoin réel : permettre aux entreprises de communiquer efficacement dans un monde digital saturé.
                  Notre aventure a commencé avec des campagnes personnalisées, un ordinateur, et beaucoup d’ambition. Aujourd’hui, nous accompagnons des marques avec des solutions complètes, humaines et mesurables.

                </p>
                <ul>
                  <li style="display: flex;"><i class="bi bi-check2-all"></i>
                    <spab>Une agence fondée par une passionnée du marketing digital</spab>
                  </li>
                  <li  style="display: flex;"><i class="bi bi-check2-all"></i> <span>Une croissance bâtie sur la confiance et les résultats</span>.</li>
                  <li  style="display: flex;"><i class="bi bi-check2-all"></i> <span>Une expérience terrain qui nourrit chaque projet</span></li>
                </ul>
                <p>
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3 class="mt-3">Des principes qui nous guident au quotidien</h3>
                <p class="mt-4">
                  Chez BDN Agency, nos valeurs ne sont pas un slogan : elles guident nos actions au quotidien. Nous plaçons l’authenticité, la rigueur et la transparence au cœur de toutes nos relations.
                </p>
                <p class="fst-italic">
                  
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Transparence dans chaque collaboration</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Engagement envers la qualité et la performance</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Respect et écoute de nos clients et de leurs audiences</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-2.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3 class="mt-3">Créer du lien, générer de l’impact</h3>
                <p class="mt-4">
                  Notre mission est de vous aider à créer du lien. Grâce à l’emailing, aux newsletters et au SMS marketing, nous donnons vie à vos messages pour qu’ils atteignent, engagent et transforment.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Stratégies ciblées, messages puissants</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Contenus engageants, rendus élégants</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Une équipe impliquée à 100 % dans votre réussite</span></li>
                </ul>
                <p class="fst-italic">
              
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3 class="mt-3">Une agence tournée vers demain</h3>
                <p class="mt-4">
                 Chez BDN Agency, nous intégrons les dernières technologies du digital pour vous faire gagner en efficacité : IA, automatisation, analyse avancée, outils no-code… L’innovation est dans notre ADN.
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>IA et segmentation intelligente</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Automatisation pour gagner du temps</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Des outils modernes pour des campagnes performantes</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-4.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

        </div>

      </div>

    </section><!-- /Features Section -->
@endif
    <!-- Call To Action Section -->
@if(!empty($sections['cta_section']) && $sections['cta_section'] == 1)

    <section id="call-to-action" class="call-to-action section dark-background mt-3 {{(!$showHero && $firstSection === 'cta_section') ? 'first-section-margin' : '' }}">

      <div class="container ">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="text-center">
            <h3 class=" text-center">Obtenez votre Devis Personnalisé</h3>
            <p class=" text-center mt-3" style="max-width: 900px; margin: 0 auto;">Vous voulez lancer votre projet ? Confiez-nous votre stratégie de communication et bénéficiez d'une analyse sur mesure. <br class="d-none d-md-block">Notre équipe est là pour vous accompagner à chaque étape.</p>
          </div>
          <div class=" cta-btn-container text-center mt-2">
            <a class="cta-btn align-middle" href="#contact">Demander un devis</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->
@endif
    <!-- Services Section -->
@if(!empty($sections['services_section']) && $sections['services_section'] == 1)

    <section id="services" class="services section mt-5 {{ (!$showHero && $firstSection === 'services_section') ? 'first-section-margin' : '' }}">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p class="mt-5 mb-4">Ce que nous vous offrons</p>
      </div><!-- End Section Title -->

    <div class="container">
      <div class="row services-wrap">
        <!-- Left Services Column (36%) -->
        <div class="service-col-left">

           <a href="{{ route('serviceNewsletter') }}" class="services-item" data-aos="fade-right" data-aos-delay="500">
            <div class="service-icon">
              <img src="assets/img/service-icons/mail.png" alt="Web Analytics">
            </div>
            <div class="services-desc">
              <h2 class="service-title">Newsletter Clé en Main</h2>
              <p>Créez une relation durable avec vos clients. <br>Conception, rédaction,design, envoi, et analyse de performance : on s’occupe de tout. Vous n'avez qu’à valider.</p>
            </div>
          </a>
          
          <a href="{{ route('serviceBDD') }}" class="services-item" data-aos="fade-right" data-aos-delay="500">
            <div class="service-icon">
              <img src="assets/img/service-icons/data.png" alt="Pay Per Click">
            </div>
            <div class="services-desc">
              <h2 class="service-title">Location de Bases de Données</h2>
              <p>Touchez la bonne audience, au bon moment.<br>
                Accédez à des bases qualifiées et segmentées, pour des campagnes performantes.</p>
            </div>
          </a>
                  
          <a href="{{ route('serviceEmailing') }}" class="services-item" data-aos="fade-right" data-aos-delay="500">
            <div class="service-icon">
              <img src="assets/img/service-icons/location-PE.png" alt="Plateforme Emailing">
            </div>
            <div class="services-desc">
              <h2 class="service-title">Location de Plateforme Emailing</h2>
              <p>
                Envoyez vos campagnes en toute autonomie.<br>
                Louez une plateforme professionnelle, simple à utiliser, avec taux de délivrabilité élevé et tracking complet.
              </p>
            </div>
          </a>


        </div>
        
        <!-- Middle Circle Image (28%) -->
        <div class="service-col-center">
          <div class="circle-image-wrapper" data-aos="zoom-in" data-aos-delay="400">
            <img src="assets/img/service-icons/services600.png" alt="Our Services" class="circle-image">
            <!--<div class="man-animated">
            <img src="assets/img/service-icons/png-men.png" alt="Our Services" class="circle-image">
            </div>-->
          </div>
        </div>

        <!-- Right Services Column (36%) -->
        <div class="service-col-right">

          <a href="{{ route('serviceSMS') }}" class="services-item"  data-aos="fade-left" data-aos-delay="500">
            <div class="service-icon">
              <img src="assets/img/service-icons/mapping.png" alt="Site Mapping">
            </div>
            <div class="services-desc">
              <h2 class="service-title">Location de Plateforme SMS</h2>
              <p>Diffusez vos messages instantanément.Une solution rapide, efficace pour atteindre votre cible via SMS, avec option de gestion</p>
            </div>
          </a>
            
        
          <div class="services-item" data-aos="fade-left" data-aos-delay="500">
             <div class="service-icon">
              <img src="assets/img/service-icons/vision.png" alt="Site Auditing">
            </div>
            <div class="services-desc">
              <h2 class="service-title">Le Visionnaire</h2>
              <p>Le média business qui connecte les idées, leaders et opportunités.Sponsorisez des contenus ou insérez votre pub dans notre newsletter des décideurs.</p>
            </div>
          </div>

           <div class="services-item" data-aos="fade-left" data-aos-delay="500">
             <div class="service-icon">
              <img src="assets/img/service-icons/branding.png" alt="Site Auditing">
            </div>
            <div class="services-desc">
              <h2 class="service-title">Branding & Identité Visuelle</h2>
              <p>Faites rayonner votre marque dès le premier regard.Nous créons pour vous une image cohérente, forte et mémorable.</p>
            </div>
          </div>

        </div>

      </div><!--end-services-wrap-->
    </div><!--end-container-->

    </section><!-- /Services Section -->
@endif
    <!-- Portfolio Section -->
@if(!empty($sections['portfolio_section']) && $sections['portfolio_section'] == 1)

    <section id="portfolio" class=" {{ (!$showHero && $firstSection === 'portfolio_section') ? 'first-section-margin' : '' }}" data-aos="fade-up" data-aos-delay="100">

      @livewire('project-display')


    </section><!-- /Portfolio Section -->
@endif
    <!-- Testimonials Section -->
@if(!empty($sections['testimonials_section']) && $sections['testimonials_section'] == 1)

    <section id="testimonials" class="testimonials section {{ (!$showHero && $firstSection === 'testimonials_section') ? 'first-section-margin' : '' }}">

      <!-- Section Title -->
      <div class="container section-title pb-0 mt-4" data-aos="fade-up">
        <h2>Témoignages</h2>
        <p class="mt-5 mb-4">Votre retour, notre fierté</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 10
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
@endif
@if(!empty($sections['pricing_section']) && $sections['pricing_section'] == 1)
    <section id="nosTarifs" class="pricing section {{ (!$showHero && $firstSection === 'pricing_section') ? 'first-section-margin' : '' }}">
        <div class="container section-title" data-aos="fade-up">
            <h2>Offres</h2>
            <p class="mt-5 mb-4">Nos Tarifs</p>
        </div>

        <div class="container filter-bar d-flex mb-5" data-aos="fade-up" data-aos-delay="50">
            <label class="fw-light text-dark mt-2">Choisissez votre service souhaité :</label>
            <div class="custom-select-wrapper">
                <div class="custom-select-toggle">{{ $services->first()->name ?? 'Choisir un service' }}</div>
                <ul class="custom-select-options">
                    @foreach($services as $service)
                        <li data-value="service{{ $service->id }}" class="{{ $loop->first ? 'active' : '' }}">
                            {{ $service->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

       @foreach($services as $service)
          <div class="container" id="service{{ $service->id }}">
              <div class="row gy-3">
                  @foreach($service->packs as $pack)
                      <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-service="{{ $pack->packType->name ?? 'pack' }}">
                          <div class="pricing-item-wrapper" style="height: 100%; display: flex; flex-direction: column;">
                              <div class="pricing-item {{ $loop->index === 1 ? 'featured' : '' }}" style="flex: 1; display: flex; flex-direction: column;">
                                  @if ($loop->last)
                                      <span class="advanced">Personnalisé</span>
                                  @endif
                                  <h3>{{ $pack->packType->name ?? 'Pack' }}</h3>
                                  <h4><sup>$</sup>{{ number_format($pack->price, 2) }}<span> / month</span></h4>
                                  <ul>
                                      @foreach($pack->offers as $offer)
                                          <li class="{{ $offer->active ? '' : 'na' }}">{{ $offer->name }}</li>
                                      @endforeach
                                  </ul>
                                  <div class="btn-wrap" style="margin-top: auto;">
                                      <a href="#" class="btn-buy">Buy Now</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
        @endforeach


    </section>
@endif

    <!-- Faq Section -->
@if(!empty($sections['faq_section']) && $sections['faq_section'] == 1)

    <section id="faq" class="faq section mt-5 {{ (!$showHero && $firstSection === 'faq_section') ? 'first-section-margin' : '' }}">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>FAQ</h2>
        <p class="mt-5 mb-4">On répond à vos questions</p>
      </div><!-- End Section Title -->

      <div class="container mt-3" data-aos="fade-up">
        <div class="row">
          <div class="col-12">
            <div class="custom-accordion" id="accordion-faq">
              @foreach($faqs as $index => $faq)
                  <div class="accordion-item">
                      <h2 class="mb-0">
                          <button class="btn btn-link {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-faq-{{ $faq->id }}">
                              {{ $faq->question }}
                          </button>
                      </h2>
                    
                      <div id="collapse-faq-{{ $faq->id }}" class="collapse {{ $index === 0 ? 'show' : '' }}" data-parent="#accordion-faq">
                          <div class="accordion-body">
                              {{ $faq->answer }}
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>
        </div>
      </div>
      </div>
    </section><!-- /Faq Section -->
@endif

    <!-- Team Section -->
@if(!empty($sections['team_section']) && $sections['team_section'] == 1)
<section id="team" class="team section mt-5 {{(!$showHero && $firstSection === 'team_section') ? 'first-section-margin' : '' }}">
    <div class="container section-title" data-aos="fade-up">
        <h2>Équipe</h2>
        <p class="mt-5 mb-4">Une équipe engagée à vos côtés</p>
    </div>

    <div class="container mt-4" data-aos="fade-up" data-aos-delay="100">
        @if(count($teamMembers) > 4)
            <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
                
                <!-- Carousel Indicators (Dots) -->
                <div class="carousel-indicators" style="margin-top: 70px; position: absolute;">
                    @foreach($teamMembers->chunk(4) as $chunkIndex => $chunk)
                        <button type="button" data-bs-target="#teamCarousel" data-bs-slide-to="{{ $chunkIndex }}" class="{{ $chunkIndex == 0 ? 'active' : '' }}" aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $chunkIndex + 1 }}"></button>
                    @endforeach
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner" style="min-height: 400px;">
                    @foreach($teamMembers->chunk(4) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="row gy-4">
                                @foreach($chunk as $member)
                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                    <div class="team-member">
                                        <div class="member-img">
                                            <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="">
                                            <div class="social">
                                                @if($member->twitter)<a href="{{ $member->twitter }}"><i class="bi bi-twitter-x"></i></a>@endif
                                                @if($member->facebook)<a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>@endif
                                                @if($member->instagram)<a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>@endif
                                                @if($member->linkedin)<a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>@endif
                                            </div>
                                        </div>
                                        <div class="member-info">
                                            <h4>{{ $member->name }}</h4>
                                            <span>{{ $member->position }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Static Grid if 4 or fewer members -->
            <div class="row gy-4">
                @foreach($teamMembers as $member)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="">
                            <div class="social">
                                @if($member->twitter)<a href="{{ $member->twitter }}"><i class="bi bi-twitter-x"></i></a>@endif
                                @if($member->facebook)<a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>@endif
                                @if($member->instagram)<a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>@endif
                                @if($member->linkedin)<a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>@endif
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ $member->name }}</h4>
                            <span>{{ $member->position }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endif



    <!-- Recent Posts Section -->
@if(!empty($sections['recentposts_section']) && $sections['recentposts_section'] == 1)
<section id="recent-posts" class="recent-posts section {{ (!$showHero && $firstSection === 'recentposts_section') ? 'first-section-margin' : '' }}">

  <div class="container section-title mt-5" data-aos="fade-up">
    <h2>À la une</h2>
    <p class="mt-5 mb-4">À lire en ce moment<br></p>
  </div>

  <div class="container">
    <div class="row gy-4 mt-1">

      @foreach ($recentPosts as $post)
      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
        <article class="d-flex flex-column h-100">

          <div class="post-img">
            <img src="{{ asset('storage/' . $post->image) }}"  alt="{{ $post->image_alt }}" title="{{ $post->image_title }}" class="img-fluid">
          </div>

          <p class="post-category">{{ $post->category?->name }}</p>

          <h2 class="title">
            <a href="#">{{ $post->title }}</a>
          </h2>

          <p>{{ \Illuminate\Support\Str::limit($post->description, 100) }}</p>

          <div class="mt-auto d-flex align-items-center">
            <div class="post-meta d-flex align-items-end ms-auto">
              <p class="post-date"><time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('M d, Y') }}</time></p>
            </div>
          </div>

        </article>
      </div>
      @endforeach

    </div>
  </div>
</section>
@endif


    <!-- Contact Section -->
@if(!empty($sections['contact_section']) && $sections['contact_section'] == 1)

    <section id="contact" class="contact section mt-5 {{(!$showHero && $firstSection === 'contact_section') ? 'first-section-margin' : '' }}">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p class="mt-5 mb-4">Contact Us</p>
      </div><!-- End Section Title -->

      <div class="container mt-5 mb-4" data-aos="fade" data-aos-delay="100">
        
        <div class="row gy-4">
          @if($contactInfo)

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Adresse</h3>
                <p>{{ $contactInfo->address }}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Contactez-nous</h3>
                <p>{{ $contactInfo->phone }}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Envoyez-nous un email</h3>
                <p>{{ $contactInfo->email }}</p>
              </div>
            </div><!-- End Info Item -->
          </div>
          @endif

          <div class="col-lg-8">
            <form action="{{ route('devis.send') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">
              
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Votre Nom..." required>
                </div>
              
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" placeholder="Votre Email..." required>
                </div>
              
                <div class="col-md-12">
                  <input type="text" name="subject" class="form-control" placeholder="Objet..." required>
                </div>
              
                <div class="col-md-12">
                  <div class="dropdown-multiselect">
                    <div class="dropdown-header" onclick="toggleDropdown()">Sélectionnez les services</div>
                    <div class="dropdown-list" id="servicesDropdown">
                      @foreach($services as $service)
                        <label class="dropdown-item">
                          <input type="checkbox" name="services[]" value="{{ $service->name }}">
                          {{ $service->name }}
                        </label>
                      @endforeach
                    </div>
                  </div>
                </div>
              
                <div class="col-md-12">
                  <textarea name="message" rows="6" class="form-control" placeholder="Message..." required></textarea>
                </div>
              
                <div class="col-md-12 text-center">
                  <div class="loading">Chargement...</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Votre message a été envoyé. Merci !</div>
                
                  <button type="submit">Demander Un devis</button>
                </div>
              
              </div>
            </form>
          </div>


        </div>

      </div>

    </section><!-- /Contact Section -->
@endif
  </main>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>


</body>

</html>
@endsection
