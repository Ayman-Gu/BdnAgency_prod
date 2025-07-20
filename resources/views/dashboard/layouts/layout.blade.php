<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Trix Editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    
    <style>
      #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: rgb(255, 226, 205);
        transition: margin-left 0.3s ease;
        z-index: 1050;
      }

      @media (max-width: 768px) {
        #sidebar {
          margin-left: -250px; 
          position: fixed;
          height: 100vh;
          z-index: 1045;
          top: 0;
          left: 0;
          box-shadow: 2px 0 5px rgba(0,0,0,0.1);
          background: rgb(225 189 163);
        }
        #sidebar.show {
          margin-left: 0;
        }
      }

      /* Main content: push right on desktop */
      @media (min-width: 769px) {
        .main-content {
          margin-left: 250px;
        }
      }


      #sidebar.collapsed {
        margin-left: -250px;
      }

      /* Mobile styles */
      @media (max-width: 768px) {
        #sidebar {
          margin-left: -250px; 
          position: fixed;
          height: 100vh;
          z-index: 1045;
          top: 0;
          left: 0;
          box-shadow: 2px 0 5px rgba(0,0,0,0.1);
          background: rgb(225 189 163);
        }
        #sidebar.show {
          margin-left: 0;
        }
        #sidebar-overlay {
          display: none;
          position: fixed;
          top: 0; left: 0;
          width: 100vw; height: 100vh;
          background: rgba(0,0,0,0.3);
          z-index: 1040;
          transition: opacity 0.3s ease;
        }
        #sidebar-overlay.show {
          display: block;
          opacity: 1;
        }
      }

      /* Header styles */
      .header-icons > * {
        margin-left: 15px;
        cursor: pointer;
      }

      .name-circle {
        background-color: black;
        border-radius: 50%;
        width: 30px;
        height: 30px;
      }

      .sitename {
        border-bottom: 2px solid #919191;
        padding-top: 18px;
        padding-bottom: 10px;
        text-align: center;
      }

      .header-logo {
        width: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
      }

      .sidebar-link {
        transition: background-color 0.2s ease;
      }

      .sidebar-link:hover {
        background-color: #e9ecef;
      }

      .sidebar-link.active {
        background-color: #ff9046;
        font-weight: 500;
        color: #000000;
      }
      .dropdown-menu .dropdown-item {
          transition: background-color 0.3s ease, color 0.3s ease;
      }

      .dropdown-menu .dropdown-item:hover,
      .dropdown-menu .dropdown-item:focus {
          background-color: #ffe5d0;
          color: #d9534f;
      }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sitename">
                <img src="assets/img/hero/1.png" class="header-logo" alt="Logo" />
            </div>
            <ul class="nav flex-column mt-5">
                <li class="nav-item">
                   <a href="{{ route('dashboard') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('dashboard') ? 'active' : '' }}">
                      Gestion des Pages
                   </a>
                </li>
              
                 <li class="nav-item">
                   <a href="{{ route('blogs-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('blogs-manager') ? 'active' : '' }}">
                      Gestion des Blogs
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('team-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('team-manager') ? 'active' : '' }}">
                      Gestion de l'Équipe
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('contact-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('contact-manager') ? 'active' : '' }}">
                      Gestion des Contacts
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('newsletter') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('newsletter') ? 'active' : '' }}">
                      Abonnés à la Newsletter
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('faq-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('faq-manager') ? 'active' : '' }}">
                      Gestion des FAQ
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('services-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('services-manager') ? 'active' : '' }}">
                      Gestion des Services
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('projects-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('projects-manager') ? 'active' : '' }}">
                      Gestion des Projets
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('testimonials-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('testimonials-manager') ? 'active' : '' }}">
                      Gestion des Témoignages
                   </a>
                </li>
              
                <li class="nav-item">
                   <a href="{{ route('importPdf-manager') }}" 
                      class="nav-link text-dark sidebar-link {{ request()->url() == route('importPdf-manager') ? 'active' : '' }}">
                      Importer des Fichiers PDF
                   </a>
                </li>
              
            </ul>
        </nav>


        <!-- Overlay for mobile -->
        <div id="sidebar-overlay"></div>

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column main-content">
            <header class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom bg-white shadow-sm">
                <button class="btn d-md-none" id="sidebarToggle" aria-label="Basculer le menu">
                    <i class="bi bi-list fs-3"></i>
                </button>
              
                <div class="header-icons d-flex align-items-center ms-auto">
                    <!--
                    <i class="bi bi-bell-fill fs-5"></i>
                    -->
                    <!-- Dropdown -->
                    <div class="dropdown ms-3">
                        <button class="btn border-0 bg-transparent p-0 d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="name-circle d-flex justify-content-center align-items-center text-white fw-bold me-2">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <i class="bi bi-chevron-down fs-5 text-dark"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded" aria-labelledby="userDropdown" style="min-width: 150px;">
                            <li>
                                <span class="dropdown-item-text fw-semibold">{{ Auth::user()->name }}</span>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
          
            <!-- Content area -->
            <main class="p-4 flex-grow-1 bg-light">
                <h1 class="mb-4">Tableau de bord</h1>
            
                @yield('content')
            </main>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('sidebarToggle');
      const overlay = document.getElementById('sidebar-overlay');

      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
      });

      overlay.addEventListener('click', () => {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
      });

      window.addEventListener('resize', () => {
        if(window.innerWidth > 768) {
          sidebar.classList.remove('show');
          overlay.classList.remove('show');
        }
      });
    </script>
    @stack('scripts')

</body>
</html>
