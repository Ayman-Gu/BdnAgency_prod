<!-- Main Content -->
<div class="flex-grow-1 d-flex flex-column main-content  min-vh-100">
    <header class="custom-header d-flex align-items-center justify-content-between px-4 py-3 position-relative">

        <!-- Sidebar Toggle Button -->
        <button class="btn text-dark position-absolute start-0 ms-3 d-none d-md-inline-block" id="sidebarToggle" aria-label="Toggle Sidebar">
            <i class="bi bi-list fs-4"></i>
        </button>

        <!-- Right Side -->
        <div class="d-flex align-items-center ms-auto">
            <!-- Fullscreen Toggle Button -->
            <button class="btn text-dark me-3" id="fullscreenToggle" aria-label="Toggle Fullscreen">
                <i class="bi bi-arrows-fullscreen fs-5"></i>
            </button>
            <div class="dropdown">
                <button class="btn border-0 bg-transparent p-0 d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="name-circle text-white fw-bold me-2">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <i class="bi bi-chevron-down fs-5 text-dark transition-icon"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end user-dropdown shadow-sm border-0 rounded" aria-labelledby="userDropdown">
                    <li>
                        <span class="dropdown-item-text fw-semibold text-dark">{{ Auth::user()->name }}</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </header>
     <!-- Main Section (same wrapper!) -->
    <main class="p-4 flex-grow-1">
        @yield('content')
    </main>
</div>
