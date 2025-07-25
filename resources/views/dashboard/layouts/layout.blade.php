<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Trix Editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <link rel="stylesheet" href="{{asset('admin/styles/layout.css')}}">
    <link rel="stylesheet" href="{{asset('admin/styles/cards.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

</head>
<body>
     <!-- Sidebar -->
    @include('dashboard.layouts.sidebar')

    <!-- Main content (header + content) -->
    <div class="main-wrapper">
        @include('dashboard.layouts.content')
    </div>

    <div id="page-loader">
  <div class="spinner-border" role="status"></div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin/scripts/sidebarResponsive.js')}}"></script>
    <script src="{{asset('admin/scripts/spin.js')}}"></script>

    @stack('scripts')

</body>
</html>