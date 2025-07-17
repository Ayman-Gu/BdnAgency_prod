<section id="portfolio" class="portfolio section">
    <!-- Section Title -->
    <div class="container section-title">
        <h2>Projets</h2>
        <p class="mt-5 mb-3">Ce que nous avons accompli</p>
    </div>

    <div class="container">
        <!-- Filters -->
        <ul class="portfolio-filters isotope-filters mt-5 mb-5">
            <li class="{{ $filter === 'all' ? 'filter-active' : '' }}" 
                wire:click="setFilter('all')" style="cursor:pointer">
                All
            </li>

           @foreach($categories as $category)
                <li class="{{ $filter === (string) $category->id ? 'filter-active' : '' }}"
                    wire:click="setFilter('{{ $category->id }}')"
                    style="cursor:pointer">
                    {{ $category->name }}
                </li>
            @endforeach
            
        </ul>

        <!-- Projects -->
        <div class="row gy-4 isotope-container mb-4">
           @if($projects->isEmpty())
                <div class="col-12 text-center text-muted py-5">
                    Aucun projet trouvé pour cette catégorie.
                </div>
            @else
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid" alt="{{ $project->image_alt }}" style="object-fit: cover ; height:100%">
                        <div class="portfolio-info">
                            <h4>{{ $project->title }}</h4>
                            <p>{{ Str::limit($project->description, 50) }}</p>
                            <a href="{{ asset('storage/' . $project->image) }}" title="{{ $project->image_title }}" 
                               data-gallery="portfolio-gallery" class="glightbox preview-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                            <a href="#" title="More Details" class="details-link">
                                <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
