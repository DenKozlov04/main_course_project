document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.toggle-button');
    const sidebar = document.querySelector('.sidebar');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        const isOpen = sidebar.classList.contains('open');
        toggleButton.innerHTML = isOpen ? 'Close' : '<img src="../images/free-icon-funnel-tool-4052123.png" alt="Toggle Image">';
    });
});

