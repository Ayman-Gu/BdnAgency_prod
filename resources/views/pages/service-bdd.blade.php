@extends('layouts.frontend')
@section('mainContent')
 @section('title', 'Location de Base de Données - BDN Agency')

@section('meta_description', 'Accédez à des bases de données qualifiées pour vos campagnes marketing. Notre service de location de bases de données vous permet de cibler efficacement vos prospects selon votre secteur d\'activité.')

@section('meta_keywords', 'location base de données, base de données marketing, données qualifiées, prospection, campagne marketing, ciblage clients, Le Visionnaire')

<!--  CSS File -->
<link href="assets/css/service-bdd.css" rel="stylesheet">

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
        'use_cases_section',
        'testimonials_section',
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

<!-- Hero Section -->
@if($showHero)
    <section class="hero-bdd">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 data-aos="fade-down" data-aos-delay="100">Accédez à des bases de données <span style="color:#ef6603">qualifiées</span> et <span style="color:#ef6603">conformes</span> pour booster vos campagnes</h1>
                    <p data-aos="fade-down" data-aos-delay="200">BDN Agency vous offre un service de location de bases de données B2B et B2C, segmentées et constamment mises à jour, pour cibler précisément vos prospects et maximiser l'impact de vos actions marketing.</p>
                    <a href="#demo" class="cta-button mt-5" data-aos="fade-up" data-aos-delay="100">Demander une consultation gratuite</a>
                    <p class="trust text-center mt-4" data-aos="fade-up" data-aos-delay="200">
                       <i class="fas fa-check"></i>
                       <strong>Données 100% conformes CNDP</strong>
                     </p>
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
            <h2 class="section-title text-center mt-5 mb-5" data-aos="fade-up" data-aos-delay="50">
                Les atouts de nos bases de données
            </h2>
            <div class="row g-5 mt-5">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100 first-card">
                        <div class="feature-icon"><i class="fas fa-database"></i></div>
                        <h3>Bases de données segmentées</h3>
                        <p>Accédez à des listes de contacts classées par critères démographiques, géographiques, comportementaux ou sectoriels pour des campagnes ultra-ciblées.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100">
                        <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                        <h3>Données vérifiées et mises à jour</h3>
                        <p>Nos bases sont régulièrement nettoyées et enrichies pour garantir la fiabilité des informations et optimiser vos taux de délivrabilité.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100">
                        <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                        <h3>Conformité CNDP</h3>
                        <p>Nous garantissons que toutes nos bases de données sont collectées et gérées en stricte conformité avec les réglementations en vigueur, notamment la CNDP, assurant la légalité et la sécurité de vos campagnes.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card h-100">
                        <div class="feature-icon"><i class="fas fa-bullhorn"></i></div>
                        <h3>Accès multi-canal</h3>
                        <p>Utilisez nos bases pour vos campagnes d'emailing, SMS marketing, téléprospection ou publipostage, pour une stratégie de communication intégrée.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card h-100">
                        <div class="feature-icon"><i class="fas fa-handshake"></i></div>
                        <h3>Flexibilité de location</h3>
                        <p>Louez nos bases pour des campagnes ponctuelles ou sur des périodes plus longues, avec des options adaptées à vos besoins et à votre budget.</p>
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
        <div class="container">
            <h2 class="section-benefits-title text-center p-5" data-aos="fade-up" data-aos-delay="100">
                <div class="benefits-title-shape" data-aos="fade-up" data-aos-delay="100" >
                    <img src="assets/img/service-newsletter/title-shape.png" >
                </div>
                Pourquoi choisir <span style="background-color: #ef6603; padding:10px; color: #2a2c39;">BDN Agency</span> pour la location de BDD ?
            </h2>
            <div class="benefits-grid mt-5">
                <div class="benefit-card" data-aos="fade-right" data-aos-delay="100">
                    <h3>Expertise en ciblage</h3>
                    <p>Notre connaissance approfondie du marché marocain nous permet de vous conseiller sur les segments les plus pertinents pour vos objectifs.</p>
                </div>
                <div class="benefit-card" data-aos="fade-left" data-aos-delay="200">
                    <h3>Gain de temps et d'efficacité</h3>
                    <p>Évitez les recherches fastidieuses et les données obsolètes. Concentrez-vous sur votre message, nous nous occupons du reste.</p>
                </div>
                <div class="benefit-card" data-aos="fade-right" data-aos-delay="300">
                    <h3>Optimisation du ROI</h3>
                    <p>Des données de qualité supérieure se traduisent par des taux de conversion plus élevés et un meilleur retour sur investissement pour vos campagnes.</p>
                </div>
                <div class="benefit-card" data-aos="fade-left" data-aos-delay="400">
                    <h3>Accompagnement personnalisé</h3>
                    <p>Nos experts vous guident dans le choix de la base de données la plus adaptée et vous conseillent pour maximiser l'efficacité de vos actions.</p>
                </div>
            </div>
        </div>
    </section>
@endif

<!-- Use Cases Section -->
@if(!empty($sections['use_cases_section']) && $sections['use_cases_section'] == 1)
    <section class="examples-section mt-5 mb-5 {{ $firstSection === 'use_cases_section' ? 'first-section-margin' : '' }}">
        <div class="container">
            <h2 class="examples-section-title" data-aos="fade-up" data-aos-delay="100">Nos bases de données au service de votre croissance</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Nos solutions de location de BDD s'adaptent à une multitude de secteurs pour répondre à vos besoins spécifiques.
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
        </div>
    </section>
@endif

<!-- Testimonials Section -->
@if(!empty($sections['testimonials_section']) && $sections['testimonials_section'] == 1)
    <section class="testimonials-section mt-5 {{ $firstSection === 'testimonials_section' ? 'first-section-margin' : '' }}">
        <div class="container">
            <h2 class="section-testimonials-title" data-aos="fade-up" data-aos-delay="100">Ce que nos clients disent de nous</h2>
            <div class="testimonials-grid mb-5">
                @foreach ($testimonials as $index => $testimonial)
                    <div class="testimonial-card"
                         data-aos="{{ $index % 2 === 0 ? 'fade-right' : 'fade-left' }}"
                         data-aos-delay="100">
                        <div class="testimonial-text">
                            " {{ $testimonial->content }}"
                        </div>
                        <div class="testimonial-author">
                            {{ $testimonial->position ? $testimonial->position . ', ' : '' }}{{ $testimonial->author }}
                        </div>
                    </div>
                @endforeach
            </div>

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
                    Démarrez votre prochaine campagne avec des données de qualité
                </h2>
                <p class="cta-description" data-aos="fade-up" data-aos-delay="200" style="width: 70%; margin: 0 auto;">
                    Contactez BDN Agency dès aujourd'hui pour une consultation gratuite et découvrez comment nos bases de données peuvent transformer votre prospection.
                </p>
                <ul class="features-list" data-aos="fade-up" data-aos-delay="300">
                    <li>Bases de données B2B et B2C</li>
                    <li>Segmentation avancée</li>
                    <li>Conformité CNDP garantie</li>
                    <li>Mises à jour régulières</li>
                    <li>Support expert</li>
                    <li>Accès multi-canal</li>
                    <li>Flexibilité de location</li>
                </ul>
                <strong class="cta-note " data-aos="fade-up" data-aos-delay="400">L'expertise BDN Agency à votre service</strong>
                <p class="cta-note mt-4" data-aos="fade-up" data-aos-delay="500" style="width: 60%; margin: 0 auto;">
                    Notre équipe vous accompagne dans le choix et l'utilisation optimale de vos bases de données pour maximiser vos résultats.
                </p>
                <div data-aos="fade-up" data-aos-delay="500">
                    <a href="#demo" class="cta-button mt-5">Demander une consultation gratuite</a>
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
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
<!-- Js files -->
<script src="assets/js/service-bdd-page.js"></script>

@endsection
