
function PlusChildSeatPrice(button) {
    event.preventDefault();
    
    var price = button.querySelector('.PricePlace').innerText;
    var placeName = button.querySelector('.SeatLocation').innerText;

   
    console.log("price: " + price);
    console.log("seat: " + placeName);

   
    document.getElementById('AddChildrenPrice').value = price;
    document.getElementById('AddChildrenPlaceName').value = placeName;

  
    // document.querySelector('.AddChildrenForm').submit();
}

// function toggleButtonColor(button){
//     var activeClass = 'active';
//     var buttons = document.querySelectorAll('.PlaceButton');

    
//     var isActive = button.classList.contains(activeClass);

    
//     buttons.forEach(function(btn) {
//         btn.classList.remove(activeClass);
//         btn.style.backgroundColor = "#D9D9D9";
//     });

    
//     if (isActive) {
//         button.style.backgroundColor = "#D9D9D9";
//     } else {
       
//         button.classList.add(activeClass);
//         button.style.backgroundColor = "#DE6A6A";
//     } 
// }



///-------------------изменение цвета кнопок сидений----------------------------------------------
function toggleButtonColor(button) {
    var activeClass = 'active';
    var buttons = document.querySelectorAll('.PlaceButton');

    var isActive = button.classList.contains(activeClass);

    buttons.forEach(function(btn) {
        btn.classList.remove(activeClass);
        // доступна ли кнопка
        if (!btn.disabled) {
            btn.style.backgroundColor = "#D9D9D9";
        }
    });

    // доступна ли текущая кнопка
    if (!button.disabled) {
        if (isActive) {
            button.style.backgroundColor = "#D9D9D9";
        } else {
       
            button.classList.add(activeClass);
            button.style.backgroundColor = "#DE6A6A";
        }
    }
}



function getAllSeatNumbers() {
   
    var buttons = document.querySelectorAll('.PlaceButton');

    // массив для данных
    var seatNumbers = [];

    
    buttons.forEach(function(button) {
        var seatNumber = button.getAttribute('data-extra-value');

        // Добавляем значение сидения в массив
        seatNumbers.push(seatNumber);
    });

    
    return seatNumbers;
}

document.addEventListener('DOMContentLoaded', function() {
    var seatNumbers = getAllSeatNumbers();
    console.log("Seat numbers:", seatNumbers);

    // отправка массива в php переменную
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ChildSeatCheck.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log("Response from server:", response);

                // Проверяем, есть ли ошибка
                if (response.error) {
                    console.error("Server error:", response.error);
                    
                } else {
                    // Обрабатываем ответ от сервера
                    response.forEach(function(seat) {
                        var button = document.querySelector('[data-extra-value="' + seat.seatNumber + '"]');
                        if (button) {
                            if (seat.available) {
                                button.disabled = false; // включение нажатия
                            } else {
                                button.style.backgroundColor = "#6495ED"; 
                                button.disabled = true; // отключение нажатия
                            }
                        }
                    });
                }
            } else {
                console.error("Server error:", xhr.status);
               
            }
        }
    };
    var data = JSON.stringify({ seatNumbers: seatNumbers, id: flightId });
    xhr.send(data);
});