 // JS to handle sidebar click and show/hide sections
  const sidebarLinks = document.querySelectorAll('.profile-sidebar a');
  const sections = document.querySelectorAll('.profile-section');

  sidebarLinks.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();

      sidebarLinks.forEach(l => l.classList.remove('active'));
      link.classList.add('active');

      const targetId = link.getAttribute('href').substring(1);

      sections.forEach(section => {
        section.classList.remove('active');
      });

      const targetSection = document.getElementById(targetId);
      if (targetSection) {
        targetSection.classList.add('active');
        targetSection.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });

  