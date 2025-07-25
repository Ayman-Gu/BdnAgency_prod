 window.addEventListener('load', () => {
    const loader = document.getElementById('page-loader');
    if (loader) {
      setTimeout(() => {
        loader.style.display = 'none';
      }, 2000);
    }
  });