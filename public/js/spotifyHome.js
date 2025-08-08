document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-bar input');
    searchInput.addEventListener('focus', function() {
        searchInput.style.outline = '2px solid #1DB954';
    });
    searchInput.addEventListener('blur', function() {
        searchInput.style.outline = 'none';
    });
    const mixCards = document.querySelectorAll('.mix-card');
    mixCards.forEach(card => {
        card.addEventListener('mouseover', function() {
            card.style.transform = 'scale(1.05)';
            card.style.transition = 'transform 0.3s';
        });
        card.addEventListener('mouseout', function() {
            card.style.transform = 'scale(1)';
        });
    });
});