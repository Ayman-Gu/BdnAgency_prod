@extends('layouts.frontend')

@section('mainContent')

@section('title', 'Branding & Identité Visuelle - BDN Agency')
@section('meta_description', 'Créez une identité de marque forte et mémorable grâce à nos services de branding et d’identité visuelle : logo, charte graphique, stratégie de marque et design créatif.')
@section('meta_keywords', 'branding, identité visuelle, création logo, charte graphique, image de marque, design, stratégie de marque, BDN Agency')

<!--  CSS File -->
<link href="assets/css/service-branding.css" rel="stylesheet">
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
        'features_section',
        'benefits_section',
        'examples_section',
        'cta_section',
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
    <section class="hero-branding">
        <div class="container">
            <div class="hero-content" data-aos="fade-right" data-aos-delay="100">
                <!-- Text Left -->
                <div class="hero-text">
                    <h1>Façonnez une identité mémorable : Votre marque, notre expertise</h1>
                    <p class="description">BDN Agency vous accompagne dans la création et le renforcement de votre identité de marque. Du logo à la charte graphique complète, nous construisons une image forte et cohérente qui résonne avec votre audience et vous distingue sur le marché.</p>
                    <a href="#services" class="cta-button">Découvrir nos solutions Branding</a>
                    <p class="trust-note mt-sm-5 mb-5">
                        <i class="fas fa-check"></i>
                        <strong>Une identité unique pour un impact durable</strong>
                    </p>
                </div>

                <!-- Image Right -->
                <div class="hero-visual" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/img/service-branding/branding-hero.png" alt="Branding Mockup" class="branding-hero-image" loading="lazy">
                </div>
            </div>
        </div>
    </section>
@endif


    <!-- Features Section -->
@if(!empty($sections['features_section']) && $sections['features_section'] == 1)

    <section class="features position-relative overflow-hidden py- min-vh-50 min-vh-md-75 {{ (!$showHero && $firstSection === 'features_section') ? 'first-section-margin' : '' }}">
    
      <div class="circle-left"></div>
      <div class="circle-small-left"></div>
      <div class="circle-right"></div>
    
      <div class="container position-relative cards-wrapper mb-5">
        <h2 class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="50">
          Nos piliers pour une identité visuelle forte
        </h2>
      
        <div class="row g-5 mt-5">
        
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-card h-100 first-card">
              <div class="feature-icon"><i class="fas fa-pencil-ruler"></i></div>
              <h3>Création de Logo et Slogan</h3>
              <p>Conception d'un logo original et percutant, accompagné d'un slogan mémorable qui capture l'essence de votre marque et sa promesse.</p>
            </div>
          </div>
        
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-palette"></i></div>
              <h3>Développement de Charte Graphique Complète</h3>
              <p>Définition des éléments visuels fondamentaux : couleurs, typographies, iconographie, styles d'images, et règles d'utilisation pour une cohérence parfaite sur tous vos supports.</p>
            </div>
          </div>
        
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-print"></i></div>
              <h3>Design de Supports de Communication</h3>
              <p>Création de tous vos supports de communication : cartes de visite, papier en-tête, brochures, plaquettes commerciales, présentations, signatures email, etc.</p>
            </div>
          </div>
        
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-sync-alt"></i></div>
              <h3>Refonte d'Identité Visuelle</h3>
              <p>Modernisation de votre image de marque existante pour la rendre plus actuelle, plus pertinente et mieux adaptée aux évolutions de votre entreprise et de votre marché.</p>
              
            </div>
          </div>
        
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-globe"></i></div>
              <h3>Création de Site Web</h3>
              <p>Conception et développement de sites web professionnels, vitrines ou e-commerce, en parfaite harmonie avec votre nouvelle identité visuelle.</p>
              
            </div>
          </div>
        </div>
      
      </div>
    
    </section>
@endif  


    <!-- Benefits Section -->
@if(!empty($sections['benefits_section']) && $sections['benefits_section'] == 1)

    <section class="benefits-section {{ $firstSection === 'benefits_section' ? 'first-section-margin' : '' }}">
        <div class="stars"></div>

        <div class="container benefits-container"  data-aos="fade-up" data-aos-delay="100">
            <h2 class="benefit-section-title">
                L'avantage <span style="background-color: #ef6603; padding:10px; color: #2a2c39;">BDN Agency</span> pour votre image de marque
            </h2>
            
            <div class="benefits-cards-row">
                <!-- First Card - White -->
                <div class="benefit-card white-card"  data-aos="fade-up" data-aos-delay="200">
                    <h3>Approche Stratégique et Créative</h3>
                    <p>
                        Nous combinons une analyse stratégique de votre positionnement avec une créativité débordante pour concevoir une identité qui a du sens et qui marque les esprits.
                    </p>
                </div>

                <!-- Second Card - Orange -->
                <div class="benefit-card orange-card"  data-aos="fade-up" data-aos-delay="350">
                    <h3>Expertise Multicanal</h3>
                    <p>
                        Notre savoir-faire s'étend à tous les supports, garantissant une application parfaite de votre identité visuelle, du digital au print.
                    </p>
                </div>

                <!-- Third Card - White -->
                <div class="benefit-card white-card"  data-aos="fade-up" data-aos-delay="450">
                    <h3>Accompagnement Personnalisé</h3>
                    <p>
                        De la conception à la finalisation, nous travaillons en étroite collaboration avec vous pour que le résultat final reflète parfaitement votre vision.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endif

    <!-- Examples Section -->
@if(!empty($sections['examples_section']) && $sections['examples_section'] == 1)

    <section class="examples-section mt-5 {{ $firstSection === 'examples_section' ? 'first-section-margin' : '' }}" >
      <div class="container">
        <h2 class="examples-section-title" data-aos="fade-up" data-aos-delay="100">Des marques qui rayonnent grâce à BDN Agency</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
         Découvrez quelques-unes de nos réalisations qui ont permis à nos clients de se démarquer.
        </p>
      
        <div class="examples-grid">
          <div class="example-card text-center" data-aos="fade-right" data-aos-delay="100">
            <div class="example-icon-img"><img src="assets/img/service-branding/tech-startup.png" alt="tech-logo" loading="lazy"></div>
            <h4>Startup Technologique</h4>
            <p>Création d'une identité moderne et dynamique, favorisant une levée de fonds réussie et une reconnaissance immédiate sur le marché tech.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-down" data-aos-delay="100">
            <div class="example-icon-img"><img src="assets/img/service-branding/pme.png" alt="pme-logo" loading="lazy"></div>
            <h4>PME Traditionnelle</h4>
            <p>Refonte complète de l'image, attirant une nouvelle clientèle et rajeunissant la perception de la marque tout en conservant ses valeurs.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-left" data-aos-delay="100">
            <div class="example-icon-img"><img src="assets/img/service-branding/handshake.png" alt="handshake-logo" loading="lazy"></div>
            <h4>Association Humanitaire</h4>
            <p>Développement d'une charte graphique émotionnelle, augmentant la visibilité et les dons grâce à une image plus professionnelle et touchante.</p>
          </div>
        </div>

      </div>
    </section>
@endif

    <!-- Final CTA Section -->
@if(!empty($sections['cta_section']) && $sections['cta_section'] == 1)

    <section class="final-cta {{ $firstSection === 'cta_section' ? 'first-section-margin' : '' }}">
      <div class="container">
        <div class="cta-content">
          <h2 class="cta-title" data-aos="fade-up" data-aos-delay="100">
            Prêt à donner vie à votre marque ?
          </h2>

          <p class="cta-description" data-aos="fade-up" data-aos-delay="200" style="width: 70%; margin: 0 auto;">
           Contactez BDN Agency dès aujourd'hui pour une consultation gratuite et transformons ensemble votre vision en une identité visuelle inoubliable.
          </p>

          <ul class="features-list" data-aos="fade-up" data-aos-delay="300">
                <li>Création de logo et slogan</li>
                <li>Charte graphique complète</li>
                <li>Design de supports de communication</li>
                <li>Refonte d'identité visuelle</li>
                <li>Création de site web</li>
                <li>Accompagnement stratégique</li>
                <li>Expertise créative</li>
                <li>Impact durable</li>
          </ul>
          
          <div data-aos="fade-up" data-aos-delay="50">
              <a href="/#contact" class="cta-button mt-5" >Demander une consultation Branding</a>
          </div>
        </div>
      </div>
    </section>
@endif

 <!-- Pricing Section -->
@if(!empty($sections['pricing_section']) && $sections['pricing_section'] == 1)
    <section class="pricing section mb-5 {{ $firstSection === 'pricing_section' ? 'first-section-margin' : '' }} mt-5">
        <div class="container section-title" data-aos="fade-up">
            <h2>Offres</h2>
            <p class="mt-4 mb-4">Nos Tarifs</p>
        </div>

        <div class="container" id="service1">
            <div class="row gy-3">
                @foreach ($orderedPacks as $pack)
                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-service="{{ $pack->packType->name ?? 'Pack' }}">
                      <div class="pricing-item-wrapper" style="height: 100%; display: flex; flex-direction: column;">

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
<script src="assets/js/service-branding-page.js"></script>
@endsection