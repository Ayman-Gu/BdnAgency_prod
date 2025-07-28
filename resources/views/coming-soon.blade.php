<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>BDN-soon</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('comingSoon/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('comingSoon/css/styles.css') }}">



</head>

<body id="top" class="ss-preload theme-static">


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- intro
    ================================================== -->
    <section id="intro" class="s-intro">

        <div class="s-intro__bg"></div>

        <header class="s-intro__header"> 
            <div class="s-intro__logo">
                <a class="logo" href="index-static.html">
                    <img src="{{ asset('comingSoon/images/2.png') }}" alt="Homepage">
                </a>
            </div>
        </header>  <!-- s-intro__header -->

        <div class="row s-intro__content">
            <div class="column">

                <div class="text-pretitle">
                    Ravi de vous rencontrer.
                </div>

                <h1 class="text-huge-title">
                Nous préparons <br>
                quelque chose d’excitant <br>
                et d’incroyable pour vous.
                </h1>

                <div class="s-intro__content-bottom">

                    <div class="s-intro__content-bottom-block">
                        <h5>Bientôt disponible  </h5>
            
                        <div class="counter">
                            <div class="counter__time">
                                <span class="ss-days">000</span>
                                <span>D</span>
                            </div>
                            <div class="counter__time">
                                <span class="ss-hours">00</span>
                                <span>H</span>
                            </div>
                            <div class="counter__time minutes">
                                <span class="ss-minutes">00</span>
                                <span>M</span>
                            </div>
                            <div class="counter__time">
                                <span class="ss-seconds">00</span>
                                <span>S</span>
                            </div>
                        </div>  <!-- end counter -->

                    </div> <!-- end s-intro-content__bottom-block -->

                    

                </div> <!-- end s-intro-content__bottom -->

            </div>
        </div> <!-- s-intro__content -->

        

        

        <div class="s-intro__scroll">
            <a href="#hidden" class="smoothscroll">
                Scroll For More
            </a>
        </div> <!-- s-intro__scroll -->

    </section> <!-- end s-intro -->


    <!-- hidden element
    ================================================== -->
    <div id="hidden" aria-hidden="true" style="opacity: 0;"></div>


    <!-- details
    ================================================== -->
    <section id="details" class="s-details">

        <div class="row">
            <div class="column">

                <h1 class="text-huge-title text-center">
                    Nous Sommes <span style="color: orange;">BDN AGENCY</span>
                </h1>

                <nav class="tab-nav">
                    <ul class="tab-nav__list"> 
                        <li class="active" data-id="tab-about">
                            <a href="#0">
                                <span>A propos</span>
                            </a>
                        </li>
                    </ul>
                </nav> <!-- end tab-nav -->

                <div class="tab-content">

                    <!-- 01 - tab about -->
                    <div id="tab-about" class='tab-content__item'>

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>Notre histoire</h2>
                            </div>
                        </div>

                        <div class="row">
                          <div class="column">
                            <p class="lead">
                              Notre agence vous accompagne dans la mise en place de stratégies marketing performantes et personnalisées. Spécialisés dans les solutions d’emailing et de communication digitale, nous vous aidons à atteindre efficacement vos clients et à maximiser votre impact.
                            </p>
                        
                            <p>
                              Grâce à nos outils modernes et une expertise reconnue, nous créons des campagnes ciblées, mesurables et engageantes pour renforcer votre relation client et développer votre notoriété. Notre objectif : vous offrir des solutions simples, rapides et adaptées à vos besoins.
                            </p>
                        
                            <h3>Nos services</h3>
                            <ul>
                              <li><strong>Plateforme Emailing</strong> – Concevez et envoyez vos campagnes email avec une interface intuitive et des statistiques détaillées.</li>
                              <li><strong>Plateforme SMS</strong> – Atteignez vos clients rapidement via des campagnes SMS ciblées et personnalisées.</li>
                              <li><strong>Base de données</strong> – Constituez et gérez votre base de contacts qualifiés pour des campagnes toujours plus efficaces.</li>
                              <li><strong>Gestion des Newsletters</strong> – Informez et fidélisez votre audience avec des newsletters attractives et bien pensées.</li>
                              <li><strong>Le Visionnaire</strong> – Bénéficiez d’une analyse avancée et de recommandations stratégiques pour anticiper les tendances.</li>
                              <li><strong>Branding & Identité Visuelle</strong> – Créez une image de marque forte et cohérente qui parle à vos clients.</li>
                            </ul>
                        
                            
                          </div>
                        </div>

                        
                    </div> <!-- end 01 - tab about -->

                    

                </div> <!-- end tab content -->

                <!-- footer  -->
                <footer>
                    <div class="ss-copyright">
                        <span>© Copyright BDN AGENCY</span> 
                        
                    </div>
                </footer>

            </div>
        </div>

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <span>Back to Top</span>
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="26" height="26"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
             </a>
        </div> <!-- end ss-go-top -->

    </section> <!-- end s-details -->


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('comingSoon/js/plugins.js') }}"></script>
    <script src="{{ asset('comingSoon/js/main.js') }}"></script>

</body>

</html>