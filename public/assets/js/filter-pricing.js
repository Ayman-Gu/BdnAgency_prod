const wrapper = document.querySelector('.custom-select-wrapper');
const toggle = wrapper.querySelector('.custom-select-toggle');
const options = wrapper.querySelectorAll('.custom-select-options li');

const containers = document.querySelectorAll('section#nosTarifs > .container[id]');

toggle.addEventListener('click', () => {
  wrapper.classList.toggle('open');
});

options.forEach(option => {
  option.addEventListener('click', () => {
    const value = option.getAttribute('data-value'); 
    toggle.textContent = option.textContent;
    wrapper.classList.remove('open');

    options.forEach(o => o.classList.remove('active'));
    option.classList.add('active');

    containers.forEach(container => {
      container.style.display = (container.id === value) ? 'block' : 'none';
    });
  });
});

window.addEventListener('DOMContentLoaded', () => {
  containers.forEach(container => {
    container.style.display = (container.id === 'service1') ? 'block' : 'none';
  });
});
