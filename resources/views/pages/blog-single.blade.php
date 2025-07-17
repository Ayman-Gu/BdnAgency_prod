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
          <li><a href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('page.blog') }}">Blog</a></li>
          <li class="current text-white">{{ $blog->title }}</li>
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
            
            @livewire('newsletter-form', [], key('single-newsletter'))
          </aside>
        </div>
      </div>
    </div>
  </section>
</main>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<div id="preloader"></div>
@endsection
