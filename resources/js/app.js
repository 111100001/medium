import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


    import confetti from 'canvas-confetti';
document.addEventListener('DOMContentLoaded', () => {
    const clapBtn = document.getElementById('ClapButton');
    if (clapBtn) {
        clapBtn.addEventListener('click', function () {
            // Get button position
            const rect = clapBtn.getBoundingClientRect();
            const x = (rect.left + rect.width / 2) / window.innerWidth;
            const y = (rect.top + rect.height / 2) / window.innerHeight;

            confetti({
                particleCount: 20, // smaller amount
                spread: 100,        // less spread
                startVelocity: 10, // lower velocity
                origin: { x, y },
                scalar: 0.5, // smaller size
                ticks: 20, // shorter duration
            
            });
        });
    }
});