<div class="">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
 
        <div class="col-12 mb-5">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Text on the left -->
                        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                            <h1 class="fw-bold">Bonjour <span style="color: #ef6603">{{ Auth::user()->name }}</span></h1>
                            <p class="lead">Bienvenue sur notre tableau de bord</p>
                        </div>
                    
                        <!-- Image on the right -->
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('assets/img/dashboard/welcome.jpg') }}" alt="Welcome Image"
                                 class="img-fluid" style="max-width: 300px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4 w-100 px-3" style="max-width: 1200px;">

            
            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="icon-wrapper bg-primary-light text-primary mb-3">
                            <i class="bi bi-envelope-fill display-6"></i>
                        </div>
                        <h5 class="card-title">Newsletter</h5>
                        <p class="card-text fs-2 fw-bold">{{ $newsletterCount }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Abonnés récents
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="icon-wrapper bg-success-light text-success mb-3">
                            <i class="bi bi-journal-text display-6 mb-2"></i>
                        </div>
                        <h5 class="card-title">Articles</h5>
                        <p class="card-text fs-2 fw-bold">{{ $blogsCount }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Articles publiés
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="icon-wrapper bg-warning-light text-warning mb-3">
                            <i class="bi bi-people-fill display-6 mb-2"></i>
                        </div>
                        <h5 class="card-title">Utilisateurs</h5>
                        <p class="card-text fs-2 fw-bold">{{ $usersCount }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Membres inscrits
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="icon-wrapper bg-danger-light text-danger mb-3">
                            <i class="bi bi-chat-left-quote-fill display-6 text-danger mb-2"></i>
                        </div>
                        <h5 class="card-title">Témoignages</h5>
                        <p class="card-text fs-2 fw-bold">{{ $testimonialsCount }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Avis clients
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
