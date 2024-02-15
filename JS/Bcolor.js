

document.addEventListener('DOMContentLoaded', function () {
    var colorButtons = document.querySelectorAll('.colorButton button');
    var selectedValueElement = document.getElementById('selectedValue');
    var buttonValue = 0;

    colorButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Переключаем класс "active" для изменения цвета
            button.classList.toggle('active');

            // Получаем значение (текст) кнопки
            var currentValue = button.value;
            // var buttonValue = 0;
            selectedValueElement.textContent = buttonValue;
            // Проверяем, была ли кнопка нажата до этого
            if (buttonValue === currentValue) {
                // Если кнопка была нажата повторно, устанавливаем значение buttonValue в 0
                buttonValue = 0;
                // Дополнительные действия для состояния 0
            } else {
                // Если это первый раз, когда кнопка нажата, устанавливаем buttonValue в текущее значение кнопки
                buttonValue = currentValue;
                // window.location.href = '../php/OrderUserData.php?buttonValue=' + buttonValue;
                // Дополнительные действия для состояния 1
            }
            selectedValueElement.textContent = buttonValue;
        });
    });

    // Обработка отправки формы
    var orderForm = document.getElementById('orderForm');
    orderForm.addEventListener('submit', function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();

        // Отправляем значение переменной buttonValue на страницу OrderUserData.php
        window.location.href = '../php/OrderUserData.php?buttonValue=' + buttonValue;
    });
});
