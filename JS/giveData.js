

    document.addEventListener("DOMContentLoaded", function() {
        var continueButton = document.querySelector('.ContinueButton');
        var pricePlace = document.getElementById('price');
        var idPlace = document.getElementById('id');
        
        continueButton.addEventListener('click', function(event) {
            // получаю уже обозначенные цену и id
            var price = pricePlace.innerText;
            var id = idPlace.innerText;
            
            // Получаем форму
            var form = continueButton.closest('form');
            
            //  action и method для формы
            form.action = 'details1.php'; // Путь к файлу details1.php
            form.method = 'POST'; // Метод POST
            
            // создал скрытое поле
            var priceInput = document.createElement('input');
            priceInput.type = 'hidden';
            priceInput.name = 'price';
            priceInput.value = price;
            form.appendChild(priceInput);
            
            var idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = id;
            form.appendChild(idInput);
            
            // отправляетс
            form.submit();
        });
    });
