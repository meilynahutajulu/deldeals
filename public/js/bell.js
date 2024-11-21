const bell = document.querySelector('.bell');
const dropdown = document.querySelector('.dropdown');

dropdown.style.display = 'none';

bell.addEventListener('click', (event) => {
    event.stopPropagation(); 
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block'; 
    } else {
        dropdown.style.display = 'none'; 
    }
});

window.addEventListener('click', (e) => {
    if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});
