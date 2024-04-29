
///-----------------------------код для колонки А------------------------------------------------


function PlusSeatPrice(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";
    var extraValue = button.getAttribute('data-extra-value'); // значение data-extra-value

    if (clicked) {
        PricePlusQuant -= 29.99;
        button.setAttribute('data-clicked', 'false');
    } else {
        PricePlusQuant += 29.99;
        button.setAttribute('data-clicked', 'true');
    }

    button.value = PricePlusQuant.toFixed(2);

    

    console.log("New price:", PricePlusQuant.toFixed(2));
    let priceElement = document.querySelector('.price');
    document.getElementById("PriceField2").value = PricePlusQuant.toFixed(2);
    document.getElementById("seat").value = extraValue;
    priceElement.innerText = extraValue;
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}
///-----------------------------код для колонки В------------------------------------------------

function PlusSeatPrice2(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";
    var extraValue = button.getAttribute('data-extra-value');

    if (clicked) {
        PricePlusQuant -= 19.99;
        button.setAttribute('data-clicked', 'false');
    } else {
        PricePlusQuant += 19.99;
        button.setAttribute('data-clicked', 'true');
    }

    button.value = PricePlusQuant.toFixed(2);

    

    console.log("New price:", PricePlusQuant.toFixed(2));
    let priceElement = document.querySelector('.price');
    document.getElementById("PriceField2").value = PricePlusQuant.toFixed(2);
    document.getElementById("seat").value = extraValue;
    priceElement.innerText = extraValue;
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}
///-----------------------------код для колонки A2------------------------------------------------

function PlusSeatPrice3(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";
    var extraValue = button.getAttribute('data-extra-value');

    if (clicked) {
        PricePlusQuant -= 9.99;
        button.setAttribute('data-clicked', 'false');
    } else {
        PricePlusQuant += 9.99;
        button.setAttribute('data-clicked', 'true');
    }

    button.value = PricePlusQuant.toFixed(2);

    

    console.log("New price:", PricePlusQuant.toFixed(2));
    let priceElement = document.querySelector('.price');
    document.getElementById("PriceField2").value = PricePlusQuant.toFixed(2);
    document.getElementById("seat").value = extraValue;
    priceElement.innerText = extraValue;
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}

///-----------------------------код для колонки В2------------------------------------------------

function PlusSeatPrice4(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";
    var extraValue = button.getAttribute('data-extra-value');

    if (clicked) {
        PricePlusQuant -= 6.99;
        button.setAttribute('data-clicked', 'false');
    } else {
        PricePlusQuant += 6.99;
        button.setAttribute('data-clicked', 'true');
    }

    button.value = PricePlusQuant.toFixed(2);

    

    console.log("New price:", PricePlusQuant.toFixed(2));
    let priceElement = document.querySelector('.price');
    document.getElementById("PriceField2").value = PricePlusQuant.toFixed(2);
    document.getElementById("seat").value = extraValue;
    priceElement.innerText = extraValue;
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}

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
    xhr.open("POST", "InfoOutput3.php", true);
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

















