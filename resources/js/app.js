import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('toggle-dark');
    const html = document.documentElement;

    if (localStorage.getItem('dark-mode') === 'true') {
        html.classList.add('dark');
    }

    button.addEventListener('click', function () {
        html.classList.toggle('dark');

        if (html.classList.contains('dark')) {
            localStorage.setItem('dark-mode', 'true');
        } else {
            localStorage.setItem('dark-mode', 'false');
        }
    });
});
