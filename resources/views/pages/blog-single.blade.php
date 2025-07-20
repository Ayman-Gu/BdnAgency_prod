@extends('layouts.frontend')

@section('title', $blog->title . ' | BDN Agency')
@section('meta_description', Str::limit(strip_tags($blog->description), 150))
@section('meta_keywords', $blog->category?->name . ', email marketing, newsletter, stratégie')

@section('mainContent')
<link href="{{ asset('assets/css/blogSideBar.css') }}" rel="stylesheet">

<main class="main" style="margin-top: 100px;">
  <div class="page-title blog-hero-section mb-5">
    <div class="container position-relative">
      <h1 class="text-white">{{ $blog->title }}</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('index') }}" class="fw-bold">Home</a></li>
          <li><a href="{{ route('page.blog') }}"- class="fw-bold">Blog</a></li>
          <li class="current text-white fw-bold">{{ $blog->title }}</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="blog-posts section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-8">
          <article class="card p-4">
            <div class="post-img mb-3" style="max-height: 400px;" >
              <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->image_alt }}" title="{{ $blog->image_title }}" class="img-fluid w-100" >
            </div>
            <p class="post-category text-secondary">{{ $blog->category?->name}}</p>
            <h2 class="title mb-3">{{ $blog->title }}</h2>
            <p class="mb-3 text-muted"><i class="bi bi-calendar3"></i> {{ $blog->created_at->format('M d, Y') }}</p>
            <div class="blog-content">
              {!! $blog->description !!}
            </div>
          </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <aside class="sidebar p-4 bg-white rounded">
            <div class="sidebar-widget mb-5">
              <h5 class="sidebar-title ps-3 fw-bold"><i class="bi bi-folder-fill pe-3"></i>Categories</h5>
              <ul class="list-unstyled mt-3 sidebar-list">
                @foreach($categories as $category)
                  <li>
                    <a href="{{ route('page.blog') }}?category={{ $category }}">
                      <i class="bi bi-chevron-right pe-2"></i>{{ ucfirst($category) }}
                    </a>
                  </li>
                  <div class="saperated-line"></div>
                @endforeach
              </ul>
            </div>
           
            @livewire('newsletter-form', [], key('single-newsletter'))

             <div class="sidebar-widget mt-5">
                <h5 class="sidebar-title-popular fw-bold mb-4">Populaires</h5>

                @foreach($randomPosts as $post)
                    <div class="d-flex justify-content-between align-items-center bg-white p-3 mb-4 rounded shadow">
                        <div class="flex-grow-1 pe-3 ">
                            <h6 class="fw-semibold mb-1 text-dark text-truncate" style="max-width: 180px;">
                                <a href="{{ route('blog.show', $post->id) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h6>
                            <div class="text-muted small">
                                {{ $post->created_at->format('d F') }}
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                        </div>
                    </div>
                @endforeach
            </div>      
          </aside>

          
        </div>
      </div>
    </div>
  </section>


  
<!-- latest Blog Section -->
<section class="latest-blogs py-5">
  <div class="container">
    <h5 class="sidebar-title-popular fw-bold mb-4">Derniers articles</h5>
    <div class="row">
      @foreach ($latestCategories as $category)
        <div class="col-md-4 mb-4">
          <h5 class="border-bottom section-latest-blogs-title pb-2 mb-3">
            {{ $category->name }}
          </h5>
          @foreach ($categorizedPosts[$category->name] as $post)
            <div class="d-flex mb-4  blog-item">
              <div class="me-3 flex-shrink-0">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px; height: 100px; object-fit: cover;" class="rounded">
              </div>
              <div>
                <h6 class="fw-semibold mb-1 text-truncate" style="max-width: 200px;">
                  <a href="{{ route('blog.show', $post->id) }}" class="text-decoration-none text-dark">
                    {{ $post->title }}
                  </a>
                </h6>
                <div class="text-muted small">
                  {{ \Carbon\Carbon::parse($post->created_at)->format('d F') }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- / latest Blog Section -->
</main>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<div id="preloader"></div>
@endsection
