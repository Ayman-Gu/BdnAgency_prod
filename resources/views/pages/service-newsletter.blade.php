@extends('layouts.frontend')
@section('mainContent')

@section('title', 'Service Newsletter - BDN Agency')
@section('meta_description', 'Boostez votre communication grâce à notre service newsletter, idéal pour envoyer des campagnes emailing, des actualités et des offres promotionnelles ciblées.')
@section('meta_keywords', 'newsletter, service newsletter, emailing, campagne email, marketing par email, communication, Le Visionnaire')

<!--  CSS File -->
<link href="assets/css/service-newsletter.css" rel="stylesheet">

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
        'Nos_services',
        'Pourquoi_choisir_BDN_Agency',
        'Newsletters_pour_booster_votre_communication',
        'Propulsez_votre_communication_par_email',
        'section_des_offres',
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
    <section class="hero-newsletter position-relative z-2">
      <div class="container">
        <div class="row align-items-center">
          <!-- Texte -->
          <div class="col-lg-6 mb-4 mb-lg-0 hero-newsletter-text" data-aos="fade-right" data-aos-delay="100">
            <h1>
              Transformez <span class="phrase">vos prospects en clients</span> fidèles avec des newsletters percutantes
            </h1>
            <p class="fs-5 mb-5 mt-5">
              BDN Agency vous accompagne dans la conception, la rédaction et la gestion de campagnes d'emailing qui captivent votre audience et stimulent vos ventes.
            </p>
            <a href="/#contact" class="cta-hero-button mb-5">Demander une démo</a>
            <div class="gap-2 mt-5">
                    <i class="fas fa-check me-2"></i>
                    <span>Pas de carte de crédit requise</span>
            </div>
          </div>
        
          <!-- Image -->
          <div class="col-lg-6 text-center newsletter-hero-image mt-3">
            <img src="assets/img/service-newsletter/newsletter-hero.png"  alt="Subscribe to Our Newsletter Illustration"  loading="lazy" class="img-fluid" data-aos="fade-left" data-aos-delay="100">
          </div>
        </div>
      </div>
    
       <!-- Wave Shape -->
     <svg class="position-absolute top-0 end-0 h-100" width="300" height="100%" viewBox="0 0 300 800" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <path d="M0,0 C250,250 250,550 0,800 L300,800 L300,0 Z" 
              fill="#fdb27e" 
              opacity="0.3"/>
      </svg>
    
      <!-- Smaller Wave -->
      <svg class="position-absolute top-0 end-0 h-100" width="200" height="100%" viewBox="0 0 200 800" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <path d="M0,0 C150,200 150,600 0,800 L200,800 L200,0 Z" 
              fill="#ffffff" 
              opacity="0.15"/>
      </svg>
    
    </section>
@endif
    <!-- Features Section -->
@if(!empty($sections['Nos_services']) && $sections['Nos_services'] == 1)

    <section class="features position-relative overflow-hidden py- min-vh-50 min-vh-md-75 {{ (!$showHero && $firstSection === 'Nos_services') ? 'first-section-margin' : '' }}">
    
        <div class="circle-left"></div>
        <div class="circle-small-left"></div>
        <div class="circle-right"></div>
    
     <div class="container position-relative cards-wrapper">
      <h2 class="section-title text-center mt-5 mb-5" data-aos="fade-up" data-aos-delay="50">
        Nos services de Newsletter en un coup d'œil
      </h2>
      <div class="row g-5 mt-5">
      
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card h-100 first-card">
            <div class="feature-icon"><i class="fas fa-pencil-ruler"></i></div>
            <h3>Conception de templates personnalisés</h3>
            <p>Créez des newsletters à l'image de votre marque, optimisées pour tous les appareils et garantissant une expérience utilisateur fluide.</p>
          </div>
        </div>
      
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card h-100">
            <div class="feature-icon"><i class="fas fa-pen-nib"></i></div>
            <h3>Rédaction de contenu engageant</h3>
            <p>Nos rédacteurs experts créent des messages percutants qui informent, divertissent et incitent à l'action, adaptés à votre cible.</p>
          </div>
        </div>
      
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card h-100">
            <div class="feature-icon"><i class="fas fa-robot"></i></div>
            <h3>Gestion de campagnes automatisées</h3>
            <p>Mettez en place des scénarios d'emailing automatisés (bienvenue, anniversaire, relance panier) pour un engagement continu et personnalisé.</p>
          </div>
        </div>
      
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-card h-100">
            <div class="feature-icon"><i class="fas fa-users-cog"></i></div>
            <h3>Segmentation avancée de l'audience</h3>
            <p>Ciblez précisément vos messages grâce à une segmentation fine de vos listes de contacts, augmentant ainsi la pertinence et l'efficacité de vos campagnes.</p>
          </div>
        </div>
      
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
          <div class="feature-card h-100">
            <div class="feature-icon"><i class="fas fa-chart-pie"></i></div>
            <h3>Analyse de performance détaillée</h3>
            <p>Suivez en temps réel les indicateurs clés (taux d'ouverture, de clic, de conversion) pour optimiser vos futures campagnes et maximiser votre retour sur investissement.</p>
          </div>
        </div>
      
      </div>
    </div>

    </section>
@endif  
    <!-- Benefits Section -->
@if(!empty($sections['Pourquoi_choisir_BDN_Agency']) && $sections['Pourquoi_choisir_BDN_Agency'] == 1)

    <section class="benefits-section {{ $firstSection === 'Pourquoi_choisir_BDN_Agency' ? 'first-section-margin' : '' }}">
          <div class="stars"></div>

        <div class="container">

          <div class="benefits-title-shape" >
            <img src="assets/img/service-newsletter/title-shape.png" data-aos="fade-up" data-aos-delay="100">
          </div>
          
            <h2 class="section-benefits-title text-center p-5" data-aos="fade-up" data-aos-delay="100">Pourquoi choisir <span style="background-color: #ef6603; padding:10px; color: #2a2c39;">BDN Agency</span> pour vos newsletters ?</h2>
            <div class="benefits-grid mt-5">
                <div class="benefit-card" data-aos="fade-right" data-aos-delay="100">
                    <h3>Augmentation de l'engagement client</h3>
                    <p>Créez un lien fort avec votre audience grâce à des communications régulières et personnalisées qui renforcent la fidélité.</p>
                </div>
                <div class="benefit-card" data-aos="fade-left" data-aos-delay="200">
                    <h3>Génération de leads qualifiés</h3>
                    <p>Attirez de nouveaux prospects et convertissez-les en clients grâce à des stratégies de contenu ciblées et des appels à l'action efficaces.</p>
                </div>
                <div class="benefit-card" data-aos="fade-right" data-aos-delay="300">
                    <h3>Optimisation du ROI</h3>
                    <p>Chaque campagne est pensée pour maximiser votre retour sur investissement, en minimisant les coûts et en augmentant les conversions.</p>
                </div>
                <div class="benefit-card" data-aos="fade-left" data-aos-delay="400">
                    <h3>Expertise et accompagnement sur mesure</h3>
                    <p>Bénéficiez de l'expérience de nos experts qui vous guident à chaque étape, de la stratégie à l'analyse des résultats.</p>
                </div>
            </div>
        </div>
    </section>
@endif
    <!-- Examples Section -->
@if(!empty($sections['Newsletters_pour_booster_votre_communication']) && $sections['Newsletters_pour_booster_votre_communication'] == 1)

    <section class="examples-section mt-5 mb-5 {{ $firstSection === 'Newsletters_pour_booster_votre_communication' ? 'first-section-margin' : '' }}" >
      <div class="container">
        <h2 class="examples-section-title" data-aos="fade-up" data-aos-delay="100">Nos newsletters, vos succès</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100"> 
          Découvrez comment nos clients boostent leur communication grâce à nos newsletters adaptées.
        </p>
      
        <div class="examples-grid">
          <div class="example-card text-center" data-aos="fade-right" data-aos-delay="100">
            <div class="example-icon"><i class="fas fa-hotel"></i></div>
            <h4>Tourisme & Hôtellerie</h4>
            <p>+25% de réservations directes avec des offres exclusives et des campagnes ciblées.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-down" data-aos-delay="200">
            <div class="example-icon"><i class="fas fa-car"></i></div>
            <h4>Automobile</h4>
            <p>+15% de visites en concession grâce à la promotion de nouveaux modèles.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-left" data-aos-delay="300">
            <div class="example-icon"><i class="fas fa-hands-helping"></i></div>
            <h4>Associations</h4>
            <p>+30% d'engagement des membres et collecte de fonds optimisée.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-right" data-aos-delay="400">
            <div class="example-icon"><i class="fas fa-shopping-cart"></i></div>
            <h4>E-commerce</h4>
            <p>+15% de conversion via relance de paniers abandonnés et offres ciblées.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-up" data-aos-delay="500">
            <div class="example-icon"><i class="fas fa-briefcase"></i></div>
            <h4>Services B2B</h4>
            <p>+20% de demandes de démo et notoriété renforcée avec des contenus experts.</p>
          </div>
        
          <div class="example-card text-center" data-aos="fade-left" data-aos-delay="600">
            <div class="example-icon"><i class="fas fa-bolt"></i></div>
            <h4>Divers</h4>
            <p>Communication interne et externe boostée pour écoles, clubs, startups, etc.</p>
          </div>
        </div>
      </div>
    </section>
@endif
    <!-- Final CTA Section -->
@if(!empty($sections['Propulsez_votre_communication_par_email']) && $sections['Propulsez_votre_communication_par_email'] == 1)

    <section class="final-cta {{ $firstSection === 'Propulsez_votre_communication_par_email' ? 'first-section-margin' : '' }}">
      <div class="container">
        <div class="cta-content">
          <h2 class="cta-title" data-aos="fade-up" data-aos-delay="100">
            Prêt à propulser votre communication par email ?
          </h2>

          <p class="cta-description" data-aos="fade-up" data-aos-delay="200" style="width: 70%; margin: 0 auto;">
            Contactez-nous dès aujourd'hui pour une consultation gratuite et découvrez comment nos services de newsletter peuvent transformer votre entreprise.
          </p>

          <ul class="features-list" data-aos="fade-up" data-aos-delay="300">
            <li>Stratégie de contenu</li>
            <li>Design responsive</li>
            <li>Rédaction optimisée</li>
            <li>Automatisation avancée</li>
            <li>Reporting détaillé</li>
            <li>Support dédié</li>
            <li>Conformité CNDP</li>
            <li>Intégration CRM</li>
          </ul>
           <strong class="cta-note " data-aos="fade-up" data-aos-delay="350">L'expertise BDN Agency à votre service</strong>
          <p class="cta-note mt-4" data-aos="fade-up" data-aos-delay="350" style="width: 60%; margin: 0 auto;">
            Notre équipe est là pour vous accompagner dans la mise en place et l'optimisation de votre stratégie d'email marketing, garantissant le succès de vos campagnes.
          </p>
          <div data-aos="fade-up" data-aos-delay="50">
              <a href="/#contact" class="cta-button mt-5" >Demander une consultation gratuite</a>
          </div>
        </div>
      </div>
    </section>
@endif

     <!-- Pricing Section -->
@if(!empty($sections['section_des_offres']) && $sections['section_des_offres'] == 1)
    <section class="pricing section mb-5 {{ $firstSection === 'section_des_offres' ? 'first-section-margin' : '' }} mt-5">
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
<script src="assets/js/service-newsletter-page.js"></script>

@endsection