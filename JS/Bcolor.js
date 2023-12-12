document.addEventListener('DOMContentLoaded', function () {
    var colorButtons = document.querySelectorAll('.colorButton button ');

    colorButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Переключаем класс "active" для изменения цвета
            button.classList.toggle('active');
        });
    });
});

