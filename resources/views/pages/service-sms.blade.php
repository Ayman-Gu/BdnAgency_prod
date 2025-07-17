@extends('layouts.frontend')

@section('mainContent')
@section('title', 'Service SMS - BDN Agency')
@section('meta_description', 'Découvrez notre service SMS efficace et rapide pour envoyer des campagnes promotionnelles, des rappels et des notifications à vos clients.')
@section('meta_keywords', 'SMS, service SMS, campagne SMS, notifications SMS, marketing mobile, communication, Le Visionnaire')

<!--  CSS File -->
<link href="assets/css/service-sms.css" rel="stylesheet">
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
        'commerce_section',
        'technology_section',
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
    <section class="hero">
        <div class="container">
            <div class="row align-items-center hero-content">
                <div class="col-lg-6 hero-text" data-aos="fade-right" data-aos-delay="100">
                    <h1>Touchez votre audience en temps réel avec les SMS professionnels</h1>
                    <p class="description mt-3 mb-md-5">Envoyez des campagnes SMS personnalisées, suivez les performances et boostez votre engagement client grâce à notre plateforme fiable et rapide.</p>
                    <a href="#demo" class="cta-button">Demander une démo</a>
                    <p class="no-credit-card mb-5">
                        <i class="fas fa-check"></i>
                        <strong>
                        Pas de carte de crédit requise
                        </strong>
                    </p>
                </div>
                <div class="col-lg-6 hero-visual" data-aos="fade-left" data-aos-delay="100">
                    <div class="sms-hero-image">
                        <img src="assets/img/service-sms/woman-chair-checking-mobile.png" alt="woman on chair checking her mobile" loading="lazy" >

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@if(!empty($sections['features_section']) && $sections['features_section'] == 1)

    <!-- Features Section -->
    <section class="features position-relative overflow-hidden py- min-vh-50 min-vh-md-75 {{ (!$showHero && $firstSection === 'features_section') ? 'first-section-margin' : '' }}">
    
        <div class="circle-left"></div>
        <div class="circle-right"></div>
    
      <div class="container position-relative cards-wrapper">
        <h2 class="section-title text-center mt-5 mb-5" data-aos="fade-up" data-aos-delay="50">
         Les Fonctionnalités de BDN Agency en un coup d'œil
        </h2>
        <div class="row g-4 mt-5">
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-card h-100 first-card">
              <div class="feature-icon"><i class="fas fa-paper-plane"></i></div>
              <h3>Envoi de SMS en masse</h3>
              <p>Diffusez rapidement vos campagnes vers des milliers de destinataires en un seul clic. Idéal pour les promotions, rappels ou alertes.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-clock"></i></div>
              <h3>Planification intelligente</h3>
              <p>Programmez vos envois à l'avance selon la date et l'heure de votre choix. Gagnez du temps et optimisez l'impact au bon moment.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
               <h3>Statistiques en temps réel</h3>
               <p>Suivez les taux de livraison, les clics, les erreurs et les conversions. Analysez chaque campagne pour l'améliorer continuellement.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-card h-100">
              <div class="feature-icon"><i class="fas fa-id-badge"></i></div>
               <h3>Expéditeur personnalisé (Sender ID)</h3>
               <p>Affichez le nom de votre entreprise ou de votre marque comme expéditeur au lieu d'un numéro générique, pour renforcer la confiance et la reconnaissance.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endif
    <!-- Commerce Section -->
@if(!empty($sections['commerce_section']) && $sections['commerce_section'] == 1)

    <section class="commerce-section position-relative overflow-hidden  {{ $firstSection === 'commerce_section' ? 'first-section-margin' : '' }}">
      <div class="container commerce-section-wrapper p-5 position-relative" data-aos="fade-up" data-aos-delay="200">
        <h2 class="section-title mt-4 mb-5">Créez n'importe quel cas d'utilisation ou scénario conversationnel</h2>
      
        <!-- Background Decorative Dots -->
        <div class="custom-shapes">
          <span class="dot orange-dot"></span>
          <span class="dot white-dot"></span>
          <span class="dot orange-dot-2"></span>
          <span class="dot white-dot-2"></span>
          <img src="assets/img/service-sms/line.png" alt="" srcset="">
        </div>
      
        <!-- Cards Grid -->
        <ul class="commerce-list">
          <li><strong>Notifications de stock</strong>Alertez vos clients dès qu'un produit est de nouveau disponible</li>
          <li><strong>Promotions flash</strong>Informez instantanément de vos offres limitées dans le temps</li>
          <li><strong>Rappels d'abandon de panier</strong>Récupérez les ventes perdues avec des messages personnalisés</li>
          <li><strong>Confirmations de commande</strong>Rassurez vos clients avec des confirmations immédiates</li>
          <li><strong>Notifications de livraison</strong>Tenez vos clients informés du statut de leur commande</li>
          <li><strong>Codes promo exclusifs</strong>Envoyez des réductions personnalisées par SMS</li>
          <li><strong>Alertes de prix</strong>Notifiez les baisses de prix sur les produits favoris</li>
          <li><strong>Programmes de fidélité</strong>Communiquez les points gagnés et les récompenses disponibles</li>
          <li><strong>Événements spéciaux</strong>Annoncez vos ventes privées et lancements de produits</li>
          <li><strong>Support client</strong>Offrez une assistance rapide via SMS</li>
        </ul>
      </div>
    </section>
@endif
    <!-- Technology Section -->
    @if(!empty($sections['technology_section']) && $sections['commerce_section'] == 1)

    <section class="technology-section {{ $firstSection === 'technology_section' ? 'first-section-margin' : '' }}">
      <div class="container">
        <div class="row align-items-center">
          <!-- Text Content -->
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <h2 class="section-title">
              Une technologie de pointe pour des résultats garantis
            </h2>
            <p class="section-description">
              Notre plateforme SMS utilise une infrastructure mondiale de premier plan pour garantir une livraison fiable et rapide de vos messages partout dans le monde.
            </p>
            <ul class="tech-list">
              <li><strong>Couverture mondiale avec plus de 190 pays</strong></li>
              <li><strong>Taux de livraison supérieur à 99%</strong></li>
              <li><strong>Latence ultra-faible pour les envois en temps réel</strong></li>
              <li><strong>Conformité aux réglementations internationales (RGPD, etc.)</strong></li>
              <li><strong>API robuste pour l'intégration avec vos systèmes existants</strong></li>
              <li><strong>Infrastructure redondante pour une disponibilité maximale</strong></li>
            </ul>
          </div>
        
          <!-- Stats -->
          <div class="col-lg-5 mt-4">
            <div class="stats-grid"  data-aos="fade-left" data-aos-delay="200" >
              <div class="stat-card">
                <div class="stat-number counter" data-target="190" data-suffix="+">0</div>
                <div class="stat-label">Clients</div>
              </div>
              <div class="stat-card">
                <div class="stat-number counter" data-target="99" data-suffix="%">0</div>
                <div class="stat-label">Taux de livraison</div>
              </div>
              <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support technique</div>
              </div>
              <div class="stat-card">
                <div class="stat-number">API</div>
                <div class="stat-label">Intégration facile</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endif

    <!-- Final CTA Section -->
    @if(!empty($sections['cta_section']) && $sections['cta_section'] == 1)

    <section class="final-cta  {{ $firstSection === 'cta_section' ? 'first-section-margin' : '' }}">
      <div class="container">
        <div class="cta-content">
          <h2 class="cta-title" data-aos="fade-up" data-aos-delay="100">
            Commencez avec <span>BDN Agency SMS</span>
          </h2>
          <p class="cta-description" data-aos="fade-up" data-aos-delay="200">
            Obtenez tous les éléments essentiels pour booster vos ventes avec notre service SMS professionnel.
          </p>
        
          <ul class="features-list" data-aos="fade-up" data-aos-delay="300">
            <li>Envoi de SMS en masse</li>
            <li>Planification avancée</li>
            <li>Statistiques détaillées</li>
            <li>Sender ID personnalisé</li>
            <li>Support technique dédié</li>
            <li>Intégration e-commerce</li>
            <li>Templates prêts à l'emploi</li>
            <li>Gestion des listes de contacts</li>
          </ul>
          <p class="cta-note" data-aos="fade-up" data-aos-delay="350">
            Nos experts peuvent vous aider à mettre en place, à développer et à optimiser votre stratégie SMS.
          </p>
          <div data-aos="fade-up" data-aos-delay="50">
              <a href="#demo" class="cta-button mt-5" >Demander une démo</a>
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
<!-- Js files -->
<script src="assets/js/service-sms-page.js"></script>
@endsection