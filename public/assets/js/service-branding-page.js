document.addEventListener("DOMContentLoaded", function () {
    const starsContainer = document.querySelector('.stars');
    const numStars = 300; 

    for (let i = 0; i < numStars; i++) {
        const star = document.createElement('div');
        star.classList.add('star');

        star.style.top = `${Math.random() * 100}%`;
        star.style.left = `${Math.random() * 100}%`;

        const size = Math.random() * 2 + 1;
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;

        const duration = Math.random() * 3 + 2;
        star.style.animationDuration = `${duration}s`;

        const moveX = Math.random() * 100 - 50;
        const moveY = Math.random() * 100 - 50;

        star.animate(
            [
                { transform: 'translate(0, 0)' },
                { transform: `translate(${moveX}px, ${moveY}px)` }
            ],
            {
                duration: duration * 10000,
                iterations: Infinity,
                direction: 'alternate',
                easing: 'ease-in-out'
            }
        );

        starsContainer.appendChild(star);
    }
});