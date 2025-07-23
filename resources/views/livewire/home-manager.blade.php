<div class="">
<div class="container-fluid d-flex flex-column justify-content-center align-items-center bg-light">
    <div class="row g-4 w-100 px-3" style="max-width: 1200px;">

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-white shadow-lg" style="background: linear-gradient(135deg, #007bff, #0056b3); border-radius: 1rem; transition: transform 0.3s ease;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <i class="bi bi-envelope-fill display-3 mb-3"></i>
                    <h5 class="card-title text-uppercase">Newsletter</h5>
                    <p class="card-text fs-1 fw-bold">{{ $newsletterCount }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center text-white-50">
                    Abonnés récents
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-white shadow-lg" style="background: linear-gradient(135deg, #28a745, #1e7e34); border-radius: 1rem; transition: transform 0.3s ease;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <i class="bi bi-journal-text display-3 mb-3"></i>
                    <h5 class="card-title text-uppercase">Articles</h5>
                    <p class="card-text fs-1 fw-bold">{{ $blogsCount }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center text-white-50">
                    Articles publiés
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-white shadow-lg" style="background: linear-gradient(135deg, #ffc107, #b38600); border-radius: 1rem; transition: transform 0.3s ease;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <i class="bi bi-people-fill display-3 mb-3"></i>
                    <h5 class="card-title text-uppercase">Utilisateurs</h5>
                    <p class="card-text fs-1 fw-bold">{{ $usersCount }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center text-white-50">
                    Membres inscrits
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-white shadow-lg" style="background: linear-gradient(135deg, #dc3545, #7a1f28); border-radius: 1rem; transition: transform 0.3s ease;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <i class="bi bi-chat-left-quote-fill display-3 mb-3"></i>
                    <h5 class="card-title text-uppercase">Témoignages</h5>
                    <p class="card-text fs-1 fw-bold">{{ $testimonialsCount }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center text-white-50">
                    Avis clients
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        cursor: pointer;
    }
    .card-footer {
        font-size: 0.9rem;
        letter-spacing: 0.05em;
    }
</style>

</div>
