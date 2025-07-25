document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const mainContent = document.querySelector('.main-content');
    const fullscreenBtn = document.getElementById('fullscreenToggle');
    const fullscreenIcon = fullscreenBtn.querySelector('i');

    if (!sidebar || !toggleBtn || !mainContent) {
        console.warn("Sidebar or Toggle Button or Main Content not found.");
        return;
    }

        // Toggle sidebar (desktop + mobile)
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('collapsed');

        // Toggle class on body for optional layout changes
        document.body.classList.toggle('sidebar-collapsed');

        // Toggle mobile visibility
        if (window.innerWidth < 768) {
            sidebar.classList.toggle('mobile-visible');
        }
    });
    
     // Fullscreen toggle logic
    fullscreenBtn.addEventListener('click', () => {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch((err) => {
                console.warn(`Error attempting fullscreen: ${err.message}`);
            });
            fullscreenIcon.classList.replace('bi-arrows-fullscreen', 'bi-arrows-collapse');
        } else {
            document.exitFullscreen();
            fullscreenIcon.classList.replace('bi-arrows-collapse', 'bi-arrows-fullscreen');
        }
    });
});
