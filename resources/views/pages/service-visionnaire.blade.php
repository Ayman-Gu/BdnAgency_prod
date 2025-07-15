@extends('layouts.frontend')

@section('mainContent')

@section('title', 'Services Publicitaires - Le Visionnaire')
@section('meta_description', 'Découvrez nos services innovants en marketing, publicité et communication pour booster la visibilité de votre entreprise avec Le Visionnaire.')
@section('meta_keywords', 'marketing, publicité, communication, stratégie digitale, newsletter, branding, Le Visionnaire')

<!--  CSS File -->
<link href="assets/css/service-visionnaire.css" rel="stylesheet">
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

    <section class="hero-visionnaire">
        <div class="container">
            <div class="align-items-center hero-content">
                <div class="hero-text" data-aos="fade-right" data-aos-delay="100">
                    <h1>Amplifiez votre visibilité :<strong> Touchez l'élite du monde des affaires</strong></h1>
                    <p class="description mt-3 mb-md-5">Le Visionnaire est la plateforme de référence pour les décideurs. Profitez de nos solutions d'insertion publicitaire pour positionner votre marque au cœur des conversations business et atteindre une audience hautement qualifiée.</p>
                    <a href="#demo" class="cta-button">Découvrir nos offres publicitaires</a>
                    <p class="trust-note mt-sm-5 mb-5">
                        <i class="fas fa-check"></i>
                        <strong>
                        Des campagnes ciblées pour un impact maximal
                        </strong>
                    </p>
                </div>
                <div class="hero-visual" data-aos="fade-left" data-aos-delay="100">
                    <div class="visionnaire-hero-image">
                       <img src="assets/img/service-visionnaire/hero-image.png" alt="visionnaire-hero-image" loading='lazy'>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


    
   <!-- Features Section -->
@if(!empty($sections['features_section']) && $sections['features_section'] == 1)

    <section class="features position-relative overflow-hidden py- min-vh-50 min-vh-md-75  {{ (!$showHero && $firstSection === 'features_section') ? 'first-section-margin' : '' }}">
    
      <div class="circle-left"></div>
      <div class="circle-small-left"></div>
      <div class="circle-right"></div>
    
      <div class="container position-relative cards-wrapper mt-5 mb-5">
        <h2 class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="50">
          Des formats adaptés à vos objectifs
        </h2>
      
        <div class="row g-5 mt-5">
        
          <!-- Insertions de Bannières Stratégiques -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-card h-100 first-card">
              <div class="feature-icon"><i class="fas fa-ad"></i></div>
              <h3>Insertions de Bannières Stratégiques</h3>
              <p>Affichez votre message sur des emplacements premium de notre site. Nos formats IAB standards garantissent une visibilité optimale et un impact immédiat auprès d'une audience engagée.</p>
              <ul class="feature-points-fst">
                <li>Formats : Leaderboard (728x90), Skyscraper (160x600), Rectangle Moyen (300x250)</li>
                <li>Emplacements : Page d'accueil, articles thématiques, pages de catégories</li>
                <li>Ciblage : Par secteur d'activité, par type d'audience</li>
              </ul>
            </div>
          </div>
        
          <!-- Articles Sponsorisés et Brand Content -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-newspaper"></i></div>
              <h3>Articles Sponsorisés et Brand Content</h3>
              <p>Racontez votre histoire ou partagez votre expertise à travers des articles rédigés par nos équipes éditoriales, en parfaite adéquation avec le ton et la ligne éditoriale du Visionnaire.</p>
              <ul class="feature-points">
                <li>Rédaction : Par nos journalistes spécialisés en business</li>
                <li>Intégration : Publication fluide au sein de notre contenu éditorial</li>
                <li>Avantages : Crédibilité accrue, engagement prolongé, SEO optimisé</li>
              </ul>
            </div>
          </div>
        
          <!-- Newsletters Partenaires -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-envelope-open-text"></i></div>
              <h3>Newsletters Partenaires</h3>
              <p>Intégrez votre message ou une section dédiée dans nos newsletters quotidiennes ou hebdomadaires, directement dans les boîtes de réception de nos abonnés les plus influents.</p>
              <ul class="feature-points">
                <li>Fréquence : Quotidienne ou hebdomadaire</li>
                <li>Audience : Abonnés qualifiés (investisseurs, DG, startups, jeunes actifs)</li>
                <li>Format : Bannières dédiées, blocs de contenu, articles en vedette</li>
              </ul>
            </div>
          </div>
        
          <!-- Événements et Webinaires Sponsorisés -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-calendar-alt"></i></div>
              <h3>Événements et Webinaires Sponsorisés</h3>
              <p>Organisez ou sponsorisez des événements exclusifs (conférences, tables rondes, webinaires) en partenariat avec Le Visionnaire pour créer un engagement direct avec votre audience cible.</p>
              <ul class="feature-points">
                <li>Formats : Webinaires, conférences en ligne, tables rondes</li>
                <li>Audience : Participation sur invitation pour les profils les plus qualifiés</li>
                <li>Avantages : Génération de leads, positionnement d'expert, networking premium</li>
              </ul>
            </div>
          </div>
        
          <!-- Études de Cas et Interviews Exclusives -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-user-tie"></i></div>
              <h3>Études de Cas et Interviews Exclusives</h3>
              <p>Mettez en avant votre expertise à travers des interviews de dirigeants, des études de cas détaillées ou des analyses sectorielles réalisées par nos journalistes.</p>
              <ul class="feature-points">
                <li>Format : Articles longs, interviews vidéo, podcasts</li>
                <li>Diffusion : Multi-canal (site, newsletter, réseaux sociaux)</li>
                <li>Avantages : Thought leadership, crédibilité renforcée, SEO premium</li>
              </ul>
            </div>
          </div>
        
          <!-- Partenariats de Contenu Thématique -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-handshake"></i></div>
              <h3>Partenariats de Contenu Thématique</h3>
              <p>Créez des sections dédiées ou des dossiers spéciaux en partenariat avec Le Visionnaire sur des thématiques liées à votre secteur d'activité.</p>
              <ul class="feature-points">
                <li>Durée : Partenariats mensuels ou trimestriels</li>
                <li>Contenu : Dossiers thématiques, séries d'articles, analyses sectorielles</li>
                <li>Visibilité : Mise en avant sur toutes nos plateformes</li>
              </ul>
            </div>
          </div>
        
          <!-- Campagnes de Retargeting et Data -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="700">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
              <h3>Campagnes de Retargeting et Data</h3>
              <p>Exploitez notre base de données qualifiée pour des campagnes de retargeting ciblées et des analyses comportementales approfondies de votre audience business.</p>
              <ul class="feature-points">
                <li>Ciblage : Données first-party de qualité premium</li>
                <li>Formats : Display, email, notifications push</li>
                <li>Analytics : Rapports détaillés sur le comportement des décideurs</li>
              </ul>
            </div>
          </div>
        
        </div>
      
      </div>
    
    </section>
@endif  


    <!-- Benefits Section -->
@if(!empty($sections['benefits_section']) && $sections['benefits_section'] == 1)

    <section class="benefits-section {{ $firstSection === 'benefits_section' ? 'first-section-margin' : '' }}">
        <!-- Curvy Orange Lines Background -->
        <div class="orange-lines">
            <div class="curvy-line">
                <svg viewBox="0 0 1400 200" xmlns="http://www.w3.org/2000/svg">
                    <path class="wave-path-1" d="M-100,150 Q200,100 500,130 T1100,120 T1500,140">
                        <animate attributeName="d" 
                                 values="M-100,150 Q200,100 500,130 T1100,120 T1500,140;
                                         M-100,140 Q200,120 500,110 T1100,140 T1500,120;
                                         M-100,150 Q200,100 500,130 T1100,120 T1500,140" 
                                 dur="4s" 
                                 repeatCount="indefinite"/>
                    </path>
                    <path class="wave-path-2 mt-5" d="M-100,170 Q250,130 600,150 T1200,140 T1600,160">
                        <animate attributeName="d" 
                                 values="M-100,170 Q250,130 600,150 T1200,140 T1600,160;
                                         M-100,160 Q250,150 600,130 T1200,160 T1600,140;
                                         M-100,170 Q250,130 600,150 T1200,140 T1600,160" 
                                 dur="5s" 
                                 repeatCount="indefinite"/>
                    </path>
                </svg>
            </div>
        </div>

        <div class="container benefits-container"  data-aos="fade-up" data-aos-delay="100">
            <h2 class="benefit-section-title">
                Pourquoi choisir Le Visionnaire pour votre publicité ?
            </h2>
            
            <div class="benefits-cards-row">
                <!-- First Card - White -->
                <div class="benefit-card white-card"  data-aos="fade-up" data-aos-delay="200">
                    <h3>Audience Ultra-Qualifiée</h3>
                    <p>
                        Touchez directement les décideurs, les innovateurs et les futurs leaders du monde des affaires, une cible difficile à atteindre par les canaux traditionnels.
                    </p>
                </div>

                <!-- Second Card - Orange -->
                <div class="benefit-card orange-card"  data-aos="fade-up" data-aos-delay="350">
                    <h3>Crédibilité et Influence</h3>
                    <p>
                        Associez votre marque à un média d'information business respecté, renforçant ainsi votre image et votre positionnement sur le marché.
                    </p>
                </div>

                <!-- Third Card - White -->
                <div class="benefit-card white-card"  data-aos="fade-up" data-aos-delay="450">
                    <h3>Flexibilité et Mesure de Performance</h3>
                    <p>
                        Nous offrons des solutions personnalisables et des rapports détaillés pour suivre l'efficacité de vos campagnes et optimiser votre retour sur investissement.
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
        <h2 class="examples-section-title" data-aos="fade-up" data-aos-delay="100">Des partenariats qui génèrent des résultats</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
         Découvrez comment nos annonceurs ont amplifié leur impact grâce à Le Visionnaire.
        </p>
      
        <div class="examples-grid">
          <div class="example-card text-center" data-aos="fade-right" data-aos-delay="100">
            <div class="example-icon-img"><img src="assets/img/service-visionnaire/fst-icon.png" alt="" loading="lazy"></div>
            <h4>Société de Capital Risque</h4>
            <p>Augmentation de 30% des demandes de financement suite à une campagne de bannières ciblées sur nos articles dédiés aux startups et à l'innovation.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-down" data-aos-delay="100">
            <div class="example-icon-img"><img src="assets/img/service-visionnaire/scnd-icon.png" alt="" loading="lazy"></div>
            <h4>Cabinet de Conseil</h4>
            <p>Génération de 50+ leads qualifiés via un article sponsorisé sur les tendances du marché et les stratégies de transformation digitale.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-left" data-aos-delay="100">
            <div class="example-icon-img"><img src="assets/img/service-visionnaire/third-icon.png" alt="" loading="lazy"></div>
            <h4>Startup Tech</h4>
            <p>Accroissement de la notoriété et du trafic de 40% grâce à une série d'insertions dans nos newsletters et un partenariat de contenu thématique.</p>
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
            Prêt à transformer votre visibilité en opportunités ?
          </h2>

          <p class="cta-description" data-aos="fade-up" data-aos-delay="200" style="width: 70%; margin: 0 auto;">
           Contactez notre équipe commerciale dès aujourd'hui pour une proposition personnalisée et découvrez comment Le Visionnaire peut devenir votre partenaire stratégique.
          </p>

          <ul class="features-list" data-aos="fade-up" data-aos-delay="300">
            <li>Audience business ciblée</li>
            <li>Formats publicitaires variés</li>
            <li>Brand content intégré</li>
            <li>Newsletters partenaires</li>
            <li>Rapports de performance</li>
            <li>Accompagnement dédié</li>
          </ul>
          
          <div data-aos="fade-up" data-aos-delay="50">
              <a href="#demo" class="cta-button mt-5" >Demander une proposition</a>
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

@endsection