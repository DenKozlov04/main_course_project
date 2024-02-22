

document.addEventListener('DOMContentLoaded', function () {
    var colorButtons = document.querySelectorAll('.colorButton button');
    var selectedValueElement = document.getElementById('selectedValue');
    var buttonValue = 0;

    colorButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // изменяю класс для последующего изменения цвета
            button.classList.toggle('active');

            
            var currentValue = button.value;
            // var buttonValue = 0;
            selectedValueElement.textContent = buttonValue;
            // проверяю былали нажата кнопка
            if (buttonValue === currentValue) {
  
                buttonValue = 0;
            
            } else {
                buttonValue = currentValue;
                // window.location.href = '../php/OrderUserData.php?buttonValue=' + buttonValue;
            }
            selectedValueElement.textContent = buttonValue;
        });
    });

    var orderForm = document.getElementById('orderForm');
    orderForm.addEventListener('submit', function (event) {
        // чтобы не отсылалась автоматически
        event.preventDefault();

        // отправка занчения
        window.location.href = '../php/OrderUserData.php?buttonValue=' + buttonValue;
    });
});
