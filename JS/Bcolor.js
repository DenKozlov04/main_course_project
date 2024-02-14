document.addEventListener('DOMContentLoaded', function () {
    var colorButtons = document.querySelectorAll('.colorButton button');
    var selectedValueElement = document.getElementById('selectedValue');

    colorButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Переключаем класс "active" для изменения цвета
            button.classList.toggle('active');

            // Получаем значение (текст) кнопки
            var buttonValue = button.value;

            // Отображаем значение на странице
            selectedValueElement.textContent = buttonValue;

            // Теперь вы можете использовать переменную buttonValue для отправки на сервер или других действий
        });
    });
});

