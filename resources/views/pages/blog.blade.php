
@extends('layouts.frontend')
@section('mainContent')

@section('title', 'Blog | BDN Agency - Astuces et Stratégies d’E-mailing')
@section('meta_description', 'Découvrez nos articles et conseils experts sur l’e-mail marketing : stratégies, automatisation, newsletters, tendances et plus encore.')
@section('meta_keywords', 'blog e-mail marketing, stratégie emailing, newsletters, automatisation email, conseils marketing, BDN Agency')

  <!-- CSS File -->
  <link href="assets/css/blogSideBar.css" rel="stylesheet">

  <main class="main" style="margin-top: 100px;">

    <!-- Page Title -->
    <div class="page-title blog-hero-section mb-5">
      <div class="container position-relative">
        <h1 class="text-white">Blog</h1>
        <p class="text-white">Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current text-white">Blog</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4 ">

           <!-- Main Posts Column -->
          <div class="col-lg-8">
            <div class="row gy-4">

              @foreach($blogs as $blog)
                <div class="col-md-6">
                  <article class="d-flex flex-column h-100">
                    <div class="post-img" style=" height: 250px; overflow: hidden; position: relative;">
                      <img 
                        src="{{ asset('storage/' . $blog->image) }}" 
                        alt="{{ $blog->image_alt }}" 
                        title="{{ $blog->image_title }}" 
                        class="img-fluid" 
                        style="width: 100%; height: 100%; object-fit: cover; display: block;"
                      >
                    </div>
                  
                    <p class="post-category">{{ $blog->category?->name }}</p>
                  
                    <h2 class="title">
                      <a href="{{ route('blog.show', $blog->id) }}">
                        {{ $blog->title }}
                      </a>
                    </h2>
                  
                    <div class="blog-content preview">
                      {!! $blog->description !!}
                    </div>
                  
                    <a href="{{ route('blog.show', $blog->id) }}" class="read-more">… lire la suite</a>
                  
                    <div class="mt-auto d-flex align-items-center">
                      <div class="post-meta d-flex align-items-end ms-auto">
                        <p class="post-date">
                          <time datetime="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->format('M d, Y') }}</time>
                        </p>
                      </div>
                    </div>
                  </article>

                </div>
              @endforeach

            </div>
          </div>
          <!-- Right Sidebar -->

          <div class="col-lg-4">
            <aside class="sidebar p-4 bg-white  rounded" style="height: 100%;">
            
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

            <!--
              <div class="sidebar-widget mb-5">
                  <h5 class="sidebar-title ps-3 fw-bold">
                      <i class="bi bi-folder-fill pe-3"></i>Recent Posts
                  </h5>
                  <ul class="list-unstyled mt-3 sidebar-list">
                      @foreach ($recentPosts as $post)
                          <li class="recent-post d-flex">
                              <div class="recent-post-img mt-2">
                                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
                              </div>
                              <div class="post-content">
                                  <h6 class="mb-1">
                                      <a href="#">{{ $post->title }}</a>
                                  </h6>
                                  <p class="mb-2">{{ \Str::limit($post->description, 50) }}</p>
                                  <div class="post-meta d-flex align-items-center text-muted small">
                                      <div class="gap-3">
                                          <i class="bi bi-person"></i>
                                          <span class="me-2">{{ $post->author ?? 'Admin' }}</span>
                                      </div>
                                      <span class="pe-2">|</span>
                                      <div>
                                          <i class="bi bi-calendar3"></i>
                                          <span class="ms-2">{{ $post->created_at->format('M d, Y') }}</span>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      @endforeach
                  </ul>
              </div>
            --->
            
            
              <div class="sidebar-widget mb-5">
                <h5 class="sidebar-title  ps-3 fw-bold"><i class="bi bi-folder-fill pe-3"></i>Archives</h5>
                <ul class="list-unstyled mt-3 sidebar-list">
                  <li><a href="#"><i class="bi bi-chevron-right pe-2"></i>June 2025</a></li>
                  <div class="saperated-line"></div>
                  <li><a href="#"><i class="bi bi-chevron-right pe-2"></i>May 2025</a></li>
                  <div class="saperated-line"></div>
                  <li><a href="#"><i class="bi bi-chevron-right pe-2"></i>April 2025</a></li>
                </ul>
              </div>
            
            @livewire('newsletter-form', [], key('sidebar-newsletter'))

            
            </aside>
          </div>
        
        
        </div>
      </div>
    </section>
    <!-- /Blog Posts Section -->


    <!-- Blog Pagination Section -->
   @if ($blogs->hasPages())
<section id="blog-pagination" class="blog-pagination section mt-4 mb-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            <ul>
                {{-- Previous Page Link --}}
                @if ($blogs->onFirstPage())
                    <li><span class="disabled"><i class="bi bi-chevron-left"></i></span></li>
                @else
                    <li>
                        <a href="{{ $blogs->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                    @if ($page == $blogs->currentPage())
                        <li><a href="#" class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($blogs->hasMorePages())
                    <li><a href="{{ $blogs->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                @else
                    <li><span class="disabled"><i class="bi bi-chevron-right"></i></span></li>
                @endif
            </ul>
        </div>
    </div>
</section>
@endif

<!-- /Blog Pagination Section -->

  </main>

  
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

@endsection
