<!-- Sidebar -->
<nav id="sidebar" class="sidebar shadow-sm border-end">
    
    <div class="sidebar-header p-3 text-center border-bottom sidebar-text">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/footer/2.png') }}" class="img-fluid class="sidebar-text"" alt="Logo" style="height: 50px;">
        </a>
    </div>
    <ul class="nav flex-column mt-4">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house me-3"></i> <span class="sidebar-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-3"></i> <span class="sidebar-text">Gestion des Pages</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('blogs-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('blogs-manager') ? 'active' : '' }}">
                <i class="bi bi-journal-text me-3"></i> <span class="sidebar-text">Gestion des Blogs</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('team-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('team-manager') ? 'active' : '' }}">
                <i class="bi bi-people me-3"></i> <span class="sidebar-text">Gestion de l'Équipe</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contact-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('contact-manager') ? 'active' : '' }}">
                <i class="bi bi-envelope me-3"></i> <span class="sidebar-text">Gestion des Contacts</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('newsletter') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('newsletter') ? 'active' : '' }}">
                <i class="bi bi-newspaper me-3"></i> <span class="sidebar-text">Newsletter</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('faq-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('faq-manager') ? 'active' : '' }}">
                <i class="bi bi-question-circle me-3"></i> <span class="sidebar-text">Gestion des FAQ</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('services-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('services-manager') ? 'active' : '' }}">
                <i class="bi bi-gear me-3"></i> <span class="sidebar-text">Services</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('projects-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('projects-manager') ? 'active' : '' }}">
                <i class="bi bi-kanban me-3"></i> <span class="sidebar-text">Projets</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('testimonials-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('testimonials-manager') ? 'active' : '' }}">
                <i class="bi bi-chat-quote me-3"></i> <span class="sidebar-text">Témoignages</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('importPdf-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('importPdf-manager') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-pdf me-3"></i> <span class="sidebar-text">Import PDF</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('users-manager') ? 'active' : '' }}">
                <i class="bi bi-person me-3"></i> <span class="sidebar-text">Utilisateurs</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('roles-manager') ? 'active' : '' }}">
                <i class="bi bi-shield-lock me-3"></i> <span class="sidebar-text">Rôles</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permissions-manager') }}" class="nav-link d-flex align-items-center px-4 py-2 {{ request()->routeIs('permissions-manager') ? 'active' : '' }}">
                <i class="bi bi-lock me-3"></i> <span class="sidebar-text">Permissions</span>
            </a>
        </li>
    </ul>
</nav>
