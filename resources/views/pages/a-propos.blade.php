@extends('layouts.frontend')
@section('mainContent')

@section('title', 'À propos de BDN Agency | Experts en E-mail Marketing')
@section('meta_description', 'Apprenez-en plus sur BDN Agency, votre partenaire expert en solutions d’e-mail marketing, automation, newsletters et campagnes performantes.')
@section('meta_keywords', 'à propos BDN Agency, agence e-mail marketing, marketing digital, automation, campagnes emailing, expert emailing')

<link href="assets/css/apropos.css" rel="stylesheet">
<style>
    .first-section-margin {
        margin-top: 90px !important;
    }
</style>

@php
    $showHero = !empty($sections['hero_section']) && $sections['hero_section'] == 1;

    $sectionOrder = [
        'qui_sommes_nous_section',
        'nos_valeurs_section',
        'notre_histoire_section',
        'notre_equipe_section',
        'cta_section',
    ];

    $firstSection = null;
    foreach ($sectionOrder as $key) {
        if (!empty($sections[$key]) && $sections[$key] == 1) {
            $firstSection = $key;
            break;
        }
    }
@endphp

@if($showHero)
<section class="hero-apropos">
    <div class="container">
        <h1>À Propos de <strong style="color: #ef6603">BDN</strong> Agency</h1>
        <p class="subtitle">Votre partenaire de confiance pour une communication digitale efficace et des résultats mesurables</p>
    </div>
</section>
@endif

<main class="main-content">
    <div class="container">

    {{-- Qui sommes-nous --}}
    @if(!empty($sections['qui_sommes_nous_section']) && $sections['qui_sommes_nous_section'] == 1)
    <section class="section-notrehistoire {{ (!$showHero && $firstSection === 'qui_sommes_nous_section') ? 'first-section-margin' : '' }}" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <h2 class="section-title text-center mt-5">Qui Sommes-Nous</h2>
            <p class="description text-center" style="margin-bottom: 80px">
                BDN Agency, votre booster de communication directe, est une agence spécialisée dans la création de stratégies d'emailing sur-mesure. Nous gérons vos campagnes de newsletters pour vous aider à communiquer efficacement avec vos clients et transformer l'attention en action.
            </p>
        </div>

        <div class="about-grid mt-5">
            <div class="about-card dark">
                <div class="icon"><i class="bi bi-envelope-paper-fill"></i></div>
                <h3>Notre Mission</h3>
                <p>Vous connecter à vos clients de façon simple, directe et efficace. Nous ne vendons pas du rêve, nous créons des campagnes qui parlent à vos clients et génèrent des résultats concrets.</p>
            </div>
            <div class="about-card orange">
                <div class="icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
                <h3>Notre Vision</h3>
                <p>Permettre aux entreprises de communiquer efficacement dans un monde digital saturé grâce à des solutions complètes, humaines et mesurables.</p>
            </div>
            <div class="about-card dark">
                <div class="icon"><i class="bi bi-lightbulb-fill"></i></div>
                <h3>Notre Approche</h3>
                <p>Une expérience terrain qui nourrit chaque projet, une croissance bâtie sur la confiance et les résultats, guidée par la passion du marketing digital.</p>
            </div>
        </div>
    </section>
    @endif

    {{-- Nos Valeurs --}}
    @if(!empty($sections['nos_valeurs_section']) && $sections['nos_valeurs_section'] == 1)
    <section class="section-nos-valeurs {{ (!$showHero && $firstSection === 'nos_valeurs_section') ? 'first-section-margin' : '' }}" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <h2 class="values-title text-center">Nos Valeurs</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-envelope-check"></i></div>
                    <p class="value-description">Emailings qui cliquent, SMS qui convertissent, newsletters qui fidélisent</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-lightbulb"></i></div>
                    <p class="value-description">Des messages clairs, des visuels stylés et une stratégie alignée à vos objectifs</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-shield-check"></i></div>
                    <p class="value-description">Une base de données clean, des envois conformes CNDP, et une délivrabilité au top</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-gem"></i></div>
                    <p class="value-description">Une agence fondée par une passionnée du marketing digital</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <p class="value-description">Une croissance bâtie sur la confiance et les résultats</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-people"></i></div>
                    <p class="value-description">Une expérience terrain qui nourrit chaque projet</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Notre Histoire --}}
    @if(!empty($sections['notre_histoire_section']) && $sections['notre_histoire_section'] == 1)
    <section class="section-histoire position-relative {{ (!$showHero && $firstSection === 'notre_histoire_section') ? 'first-section-margin' : '' }}" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="circle-left"></div>
            <div class="circle-right"></div>
            <div class="circle-right-top"></div>

            <h2 class="section-title">Notre Histoire</h2>
            <p class="section-subtitle">Le début d'une vision ambitieuse, guidée par la passion</p>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-icon"><i class="bi bi-rocket-takeoff"></i></div>
                    <div class="timeline-content"><h3>Les Débuts</h3>
                        <p>BDN Agency a vu le jour à partir d'un besoin réel : permettre aux entreprises de communiquer efficacement dans un monde digital saturé. Notre aventure a commencé avec des campagnes personnalisées, un ordinateur, et beaucoup d'ambition.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <div class="timeline-content"><h3>La Croissance</h3>
                        <p>Aujourd'hui, nous accompagnons des marques avec des solutions complètes, humaines et mesurables. Notre croissance est bâtie sur la confiance et les résultats que nous apportons à nos clients.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon"><i class="bi bi-bullseye"></i></div>
                    <div class="timeline-content"><h3>L'Expertise</h3>
                        <p>Une expérience terrain qui nourrit chaque projet, une passion pour le marketing digital qui guide chacune de nos actions, et une expertise reconnue dans le domaine de l'emailing et du SMS marketing.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Notre Équipe --}}
    @if(!empty($sections['notre_equipe_section']) && $sections['notre_equipe_section'] == 1)
    <section class="section-equipe position-relative {{ (!$showHero && $firstSection === 'notre_equipe_section') ? 'first-section-margin' : '' }}" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <h2 class="section-title">Notre Équipe</h2>
            <p class="section-subtitle">Une équipe passionnée et experte, dédiée à votre succès</p>
        
            <div class="equipe-grid">
                @foreach($teamMembers as $member)
                <div class="equipe-card" style="background-image: url('{{ asset('storage/' . $member->image) }}');" alt="{{ $member->name }}">
                    <div class="equipe-card-overlay">
                        <div class="equipe-card-body">
                            <h3 class="equipe-card-title">{{ $member->name }}</h3>
                            <p class="equipe-card-role">{{ $member->position }}</p>
                            <div class="equipe-card-footer">
                                @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" class="social-icon" target="_blank"><i class="bi bi-linkedin"></i></a>
                                @endif
                                @if($member->twitter)
                                <a href="{{ $member->twitter }}" class="social-icon" target="_blank"><i class="bi bi-twitter"></i></a>
                                @endif
                                @if($member->facebook)
                                <a href="{{ $member->facebook }}" class="social-icon" target="_blank"><i class="bi bi-facebook"></i></a>
                                @endif
                                @if($member->instagram)
                                <a href="{{ $member->instagram }}" class="social-icon" target="_blank"><i class="bi bi-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    

    {{-- Call to Action --}}
    @if(!empty($sections['cta_section']) && $sections['cta_section'] == 1)
    <section class="cta {{ (!$showHero && $firstSection === 'cta_section') ? 'first-section-margin' : '' }}" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <h2>Prêt à Booster Votre Communication ?</h2>
            <p>Obtenez votre devis personnalisé et découvrez comment nous pouvons transformer votre stratégie de communication digitale.</p>
            <a href="/#contact" class="btn">Demander un Devis</a>
        </div>
    </section>
    @endif

    </div>
</main>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

@endsection
