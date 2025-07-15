 // Reveal animation on scroll
  const reveals = document.querySelectorAll('.reveal');
  function revealTimeline() {
    reveals.forEach(el => {
      const elementTop = el.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      if (elementTop < windowHeight - 100) {
        el.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", revealTimeline);
  window.addEventListener("load", revealTimeline);

  // Carousel drag-scroll logic
  const slider = document.querySelector(".services-scroll-wrapper");
  let isDown = false, startX, scrollLeft;

  slider.addEventListener("mousedown", (e) => {
    isDown = true;
    slider.classList.add("dragging");
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener("mouseleave", () => {
    isDown = false;
    slider.classList.remove("dragging");
  });

  slider.addEventListener("mouseup", () => {
    isDown = false;
    slider.classList.remove("dragging");
  });

  slider.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX);
    slider.scrollLeft = scrollLeft - walk;
  });

  // Auto-scroll setup
  let autoScrollTimer;
  let isMobile = window.innerWidth <= 768;

  function autoScrollCarousel() {
    if (isMobile) return;

    autoScrollTimer = setInterval(() => {
      const maxScrollLeft = slider.scrollWidth - slider.clientWidth;
      if (slider.scrollLeft + 5 >= maxScrollLeft) {
        slider.scrollTo({ left: 0, behavior: 'smooth' });
      } else {
        const card = slider.querySelector('.service-card');
        if (card) {
          slider.scrollBy({ left: card.offsetWidth + 15, behavior: 'smooth' });
        }
      }
    }, 5000);
  }

  function resetAutoScroll() {
    clearInterval(autoScrollTimer);
    autoScrollCarousel();
  }

function scrollCarousel(direction) {
  const card = slider.querySelector('.service-card');
  if (!card) return;

  const isMobile = window.innerWidth <= 768;
  let scrollDistance;

  if (isMobile) {
    scrollDistance = card.offsetWidth + 15;
  } else {
    scrollDistance = slider.offsetWidth * 0.6;
  }

  if (direction === 'left') {
    slider.scrollBy({ left: -scrollDistance, behavior: 'smooth' });
  } else {
    slider.scrollBy({ left: scrollDistance, behavior: 'smooth' });
  }

  resetAutoScroll();
}


  if (!isMobile) {
    slider.addEventListener('mouseenter', () => clearInterval(autoScrollTimer));
    slider.addEventListener('mouseleave', resetAutoScroll);
  }

  autoScrollCarousel();

  window.scrollCarousel = scrollCarousel;