@extends('layouts.frontend')
@section('mainContent')

<title></title>
  
<meta name="description" content="">
<meta name="keywords" content="">

@section('title', 'Service Emailing - BDN Agency')
@section('meta_description', 'Maximisez l\'impact de vos campagnes marketing avec notre service emailing, idéal pour envoyer des emails ciblés, automatisés et personnalisés à vos clients.')
@section('meta_keywords', 'location base de données, base de données marketing, données qualifiées, prospection, campagne marketing, ciblage clients, Le Visionnaire')

<!--  CSS File -->
<link href="assets/css/service-emailing.css" rel="stylesheet">
<style>
    /* Add margin-top to the first visible section after hero*/
    .first-section-margin {
        margin-top: 90px;
    }
</style>
@php
    $showHero = !empty($sections['hero_section']) && $sections['hero_section'] == 1;

    $sectionOrder = [
        'hero_section',
        'features_section',
        'emailMarketing_section',
        'automation_section',
        'cta_section',
        'services_section',
        'pricing_section',
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
    <section class="hero-emailingservice">
      <div class="container">
        <div class="hero-content">
            <img src="assets/img/emailing-service/shape-topv2.png" class="shape-top" data-aos="fade-down" data-aos-delay="100"/>

          <!-- Text Content -->
          <div class="hero-text">
            <h1 class="hero-title" data-aos="fade-right" data-aos-delay="100">
              Renforcez votre intelligence<br />
              <strong>marketing grâce à des informations orientées client</strong>
                <img src="assets/img/emailing-service/curve-arrow.png" class="curve-arrow" />
                <div class="circle"></div>
            </h1>
            <p class="hero-subtitle" data-aos="fade-right" data-aos-delay="200">
              Boostez la présence en ligne de votre entreprise avec la plateforme
              d'email marketing intégrée à l'IA de BDN Agency pour un engagement assuré.
            </p>
        
            <div class="hero-cta" data-aos="fade-right" data-aos-delay="200">
              <a href="#" class="btn-hero" >Créer un compte gratuit</a>
              <p class="no-credit-card ">
                <i class="fas fa-check"></i>
                <strong>
                Pas de carte de crédit requise
                </strong>
              </p>
            </div>
          </div>
        
         <!-- Visual Content -->
          <div class="hero-visual styled-frame" data-aos="fade-left" data-aos-delay="150">
            <img src="assets/img/emailing-service/pic1.jpg" alt="marketing-team" class="hero-image" loading="lazy"/>
            <img src="assets/img/emailing-service/circleShape.png" class="shape-circle" alt="shape" loading="lazy"/>
            <img src="assets/img/emailing-service/sun.png" class="sun" alt="shape" loading="lazy"/>
          </div>
          
        </div>

        <img src="assets/img/emailing-service/rectangles-shapev2.png" class="rectangles-bottom" alt="shape"data-aos="fade-left" data-aos-delay="100" loading="lazy"/>

      </div>
    </section>
@endif
    <!-- Features Section -->
@if(!empty($sections['features_section']) && $sections['features_section'] == 1)

    <section class="features position-relative overflow-hidden py- min-vh-50 min-vh-md-75 {{ (!$showHero && $firstSection === 'features_section') ? 'first-section-margin' : '' }}">
    
        <div class="circle-left"></div>
        <div class="circle-right"></div>
    
      <div class="container position-relative cards-wrapper">
        <h2 class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="50">
          Les caractéristiques de BDN Agency en un coup d'œil
        </h2>
        <div class="row g-4 mt-5">
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-card h-100 first-card">
              <div class="feature-icon"><i class="fas fa-envelope"></i></div>
              <h3>Campagnes de marketing</h3>
              <p>Envoyez des e-mails de marque pour attirer l'attention de votre public</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-cogs"></i></div>
              <h3>Automatisation du marketing</h3>
              <p>Créer des expériences uniques pour les clients</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-users"></i></div>
              <h3>Gestion de l'audience</h3>
              <p>Développez, gérez et ciblez votre public</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-code"></i></div>
              <h3>Email API</h3>
              <p>Synchronisez les données de vos applications préférées</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endif

    <!-- Email Marketing Section -->
@if(!empty($sections['emailMarketing_section']) && $sections['emailMarketing_section'] == 1)

    <section class="email-marketing  {{ $firstSection === 'emailMarketing_section' ? 'first-section-margin' : '' }}">
        <div class="container">
            <div class="section-header">
                <span class="section-label p-3 rounded-full" data-aos="fade-up" data-aos-delay="100">E-MAIL MARKETING</span>
                <h2 class="section-title mt-5 mb-5" style="width: 75%; margin: 0 auto;" data-aos="fade-up" data-aos-delay="100">Créer des campagnes captivantes pour favoriser des relations durables avec les clients</h2>
            </div>
            <div class="email-features">
                <div class="email-feature-list mt-5">
                   <ul  class="custom-check-list">
                    <li data-aos="fade-up" data-aos-delay="100">
                      <div class="icon"><i class="bi bi-check-circle"></i></div>
                      <div class="text">
                        Lancez la création de contenu pour votre campagne avec l'aide de l'IA.
                      </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                      <div class="icon"><i class="bi bi-check-circle"></i></div>
                      <div class="text">
                        Envoyez des emails personnalisés selon vos données, de l'activité ou des centres d'intérêt des abonnés.
                      </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300">
                      <div class="icon"><i class="bi bi-check-circle"></i></div>
                      <div class="text">
                        Réduisez le temps d'engagement en utilisant les modèles adaptables de BDN AGENCY et l'éditeur d'emails intuitif par glisser-déposer.
                      </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="500">
                      <div class="icon"><i class="bi bi-check-circle"></i></div>
                      <div class="text">
                        BDN Agency aide à protéger votre entreprise et vos abonnés des problèmes potentiels liés au spam.
                      </div>
                    </li>
                  </ul>
                  
                    <!--<div class="email-demo-image">
                        <img src="email-templates.jpg" alt="Modèles d'emails professionnels" class="demo-image">
                    </div>-->
                </div>
               <div class="email-tools-timeline-modern">
                  <div class="timeline-modern-item reveal" data-item="1">
                    <div class="timeline-modern-icon">
                      <div class="circle-dot"></div>
                      <i class="fas fa-flask"></i>
                    </div>
                    <div class="timeline-modern-card">
                      <h4>Tests A/B</h4>
                      <p>Utilisez les tests A/B pour découvrir les lignes d'objet et le contenu des e-mails les plus performants.</p>
                    </div>
                  </div>
                
                  <div class="timeline-modern-item reveal" data-item="2">
                    <div class="timeline-modern-icon">
                      <div class="circle-dot"></div>
                      <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="timeline-modern-card">
                      <h4>Rapports et analyses</h4>
                      <p>Surveillez les actions des abonnés dans vos e-mails et adaptez vos futures campagnes.</p>
                    </div>
                  </div>
                
                  <div class="timeline-modern-item reveal" data-item="3">
                    <div class="timeline-modern-icon">
                      <div class="circle-dot"></div>
                      <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="timeline-modern-card">
                      <h4>Gestion de la délivrabilité</h4>
                      <p>Nous nous chargeons de la délivrabilité pour vous, en veillant à ce que les e-mails atteignent les boîtes de réception.</p>
                    </div>
                  </div>
                </div>

                
            </div>
        </div>
    </section>
@endif

    <!-- Automation Section -->
@if(!empty($sections['automation_section']) && $sections['automation_section'] == 1)

    <section class="automation  {{ $firstSection === 'automation_section' ? 'first-section-margin' : '' }}">
        <div class="container">
            <div class="section-header">
                <span class="section-label" data-aos="fade-up" data-aos-delay="100">AUTOMATISATION DU MARKETING</span>
                <h2 class="section-title mt-5" data-aos="fade-up" data-aos-delay="150">Gagner du temps et améliorer les résultats grâce à une automatisation intelligente et basée sur les données</h2>
            </div>
             <div class="row align-items-start mt-5">
            <!-- Left Column -->
            <div class="col-md-4 ms-lg-5" data-aos="fade-right" data-aos-delay="100">
              <div class="automation-image-overlay position-relative rounded-full shadow overflow-hidden">
                <!-- Background Image -->
                <img src="assets/img/emailing-service/left-poster.png" alt="Workflow d'automatisation marketing" class="img-fluid w-100 h-100">
              
                <!-- Overlayed List -->
                <div class="overlay-content position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
                  <div class="automation-features px-4 py-5 w-100">
                    <ul class="list-unstyled">
                      <li>Concevez des parcours clients fluides grâce à nos outils conviviaux.</li>
                      <li>Façonnez les parcours des clients en utilisant des chemins basés sur des conditions.</li>
                      <li>Connectez-vous en toute transparence à vos outils préférés grâce à des intégrations flexibles.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


          <!-- Right Column -->
          <div class="col-md-7" data-aos="fade-left" data-aos-delay="100">
              <div class="automation-tools">
                <div class="auto-tool mb-4 pb-4 bg-white">
                  <h4 class=" fw-semibold">E-mails automatisés</h4>
                  <p>Envoyez automatiquement un e-mail de bienvenue ou une série d'e-mails d'accueil aux nouveaux abonnés.</p>
                </div>
              
                <div class="auto-tool auto-tool-dark mb-4 pb-4">
                  <h4>E-mails automatisés</h4>
                  <p>Marquez automatiquement les contacts en fonction de leurs interactions avec vos campagnes.</p>
                </div>
              
                <div class="auto-tool mb-4 pb-4 bg-white">
                  <h4 class=" fw-semibold">Statistiques sur l'automatisation</h4>
                  <p>Sachez combien de personnes ont déclenché votre automatisation et quelles conditions elles ont remplies.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
@endif
    <!-- CTA Section -->
@if(!empty($sections['cta_section']) && $sections['cta_section'] == 1)

    <section class="cta-section py-5  {{ $firstSection === 'cta_section' ? 'first-section-margin' : '' }}">
      <div class="container">
        <div class="row align-items-center">
          <!-- Left column -->
          <div class="col-lg-6 mb-4 mb-lg-0 cta-left-column" data-aos="fade-right" data-aos-delay="100">
            <h2 class="mb-3">Commencer avec BDN Agency</h2>
            <p class="mb-4">Obtenez tous les éléments essentiels avec le plan d'emailing gratuit</p>
            <a href="#" class="px-4 py-2 ">Créer un compte gratuit <i class="bi bi-arrow-up-right-circle"></i></a>
          </div>
        
          <!-- Right column -->
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="row">
              <div class="col-12 col-md-6">
                <ul class="list-unstyled feature-check-list">
                  <li><i class="fas fa-check-circle me-2"></i>Modèles professionnels</li>
                  <li><i class="fas fa-check-circle me-2"></i>Campagnes d'emailing</li>
                  <li><i class="fas fa-check-circle me-2"></i>Flux de travail automatisés</li>
                  <li><i class="fas fa-check-circle me-2"></i>Segmentation de l'audience</li>
                </ul>
              </div>
              <div class="col-12 col-md-6">
                <ul class="list-unstyled feature-check-list">
                  <li><i class="fas fa-check-circle me-2"></i>Formulaires d'inscription</li>
                  <li><i class="fas fa-check-circle me-2"></i>Authentification du domaine</li>
                  <li><i class="fas fa-check-circle me-2"></i>Accès à l'API marketing</li>
                  <li><i class="fas fa-check-circle me-2"></i>Gestion d'une liste</li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
@endif
    <!-- Services Section -->
@if(!empty($sections['services_section']) && $sections['services_section'] == 1)
   
    <section class="services  {{ $firstSection === 'services_section' ? 'first-section-margin' : '' }}">

          <div class="services-circle-left"></div>
          <div class="services-circle-left2"></div>

      <div class="container mt-5">
        <h2 class="services-section-title text-center mb-4" data-aos="fade-up" data-aos-delay="100">
          Nos experts peuvent vous aider à mettre en place, à développer et à optimiser votre stratégie d'emailing
        </h2>
        
        <div class="carousel-container position-relative" >

            <!-- Left Arrow -->
            <div class="carousel-arrow left-arrow" onclick="scrollCarousel('left')">
              <i class="fas fa-chevron-left"></i>
            </div>

            <div class="services-scroll-wrapper w-100 mt-5 mb-5" data-aos="zoom-in" data-aos-delay="50">
              <div class="services-grid d-flex flex-nowrap ms-3">
                <!-- Repeatable Service Cards -->
                <div class="service-card">
                  <div class="service-icon-emailing"><i class="fas fa-exchange-alt"></i></div>
                  <h4>Migration</h4>
                  <p>Migration depuis d'autres plateformes de manière fluide</p>
                </div>
              
                <div class="service-card">
                  <div class="service-icon-emailing"><i class="fas fa-plug"></i></div>
                  <h4>Intégrations et API</h4>
                  <p>Intégration fluide pour des opérations optimisées</p>
                </div>
              
                <div class="service-card">
                    <div class="service-icon-emailing">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h4>Gestion de l'audience</h4>
                    <p>Réorganisez vos données d'audience de A à Z</p>
                </div>
                <div class="service-card">
                    <div class="service-icon-emailing">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Développement de stratégie</h4>
                    <p>Élaborer des stratégies sur mesure qui trouvent un écho</p>
                </div>
                <div class="service-card">
                    <div class="service-icon-emailing">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4>Design et Intégration</h4>
                    <p>Expertise en design personnalisé et création de contenu</p>
                </div>
                <div class="service-card">
                    <div class="service-icon-emailing">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h4>Automatisation</h4>
                    <p>Automatisez vos flux d'e-mails pour améliorer la personnalisation</p>
                </div>
                <div class="service-card">
                    <div class="service-icon-emailing">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Délivrabilité et conformité</h4>
                    <p>Assurez-vous que vos e-mails atteignent les boîtes de réception</p>
                </div>
                <div class="service-card">
                    <div class="service-icon-emailing">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Analyse des performances</h4>
                    <p>Obtenez des informations approfondies et optimisez en permanence</p>
                </div>
                <div class="end-spacer"></div>
              
              </div>
            </div>

             <!-- Right Arrow -->
              <div class="carousel-arrow right-arrow" onclick="scrollCarousel('right')">
                <i class="fas fa-chevron-right"></i>
              </div>
        </div>
        
        </div>
        </div>
      </div>
    </section>
@endif
     <!-- Pricing Section -->
@if(!empty($sections['pricing_section']) && $sections['pricing_section'] == 1)
    <section class="pricing section mb-5 {{ $firstSection === 'pricing_section' ? 'first-section-margin' : '' }}">
        <div class="container section-title" data-aos="fade-up">
            <h2>Offres</h2>
            <p class="mt-4 mb-4">Nos Tarifs</p>
        </div>

        <div class="container" id="service1">
            <div class="row gy-3">
                @foreach ($orderedPacks as $pack)
                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-service="{{ $pack->packType->name ?? 'Pack' }}">
                        <div class="pricing-item {{ $loop->index === 1 ? 'featured' : '' }}">
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
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

  </main>

<!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
<!-- Js files -->
<script src="assets/js/service-emailing-page.js"></script>

@endsection