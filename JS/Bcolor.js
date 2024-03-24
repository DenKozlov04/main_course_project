

// document.addEventListener('DOMContentLoaded', function () {
//     var colorButtons = document.querySelectorAll('.colorButton button');
//     var selectedValueElement = document.getElementById('selectedValue');
//     var buttonValue = 0;

//     colorButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
//             // изменяю класс для последующего изменения цвета
//             button.classList.toggle('active');

            
//             var currentValue = button.value;
//             // var buttonValue = 0;
//             selectedValueElement.textContent = buttonValue;
//             // проверяю былали нажата кнопка
//             if (buttonValue === currentValue) {
  
//                 buttonValue = 0;
            
//             } else {
//                 buttonValue = currentValue;
//                 // window.location.href = '../php/OrderUserData.php?buttonValue=' + buttonValue;
//             }
//             selectedValueElement.textContent = buttonValue;
//         });
//     });

//     var orderForm = document.getElementById('orderForm');
//     orderForm.addEventListener('submit', function (event) {
//         // чтобы не отсылалась автоматически
//         event.preventDefault();

//         // отправка занчения
//         // window.location.href = '../php/OrderUserData.php?buttonValue=' + buttonValue;
//         window.location.href = '../php/aviability.php?buttonValue=' + buttonValue;
//     });
// });
var count = 0;
var totalPrice = 0;

function PlusSeatPrice(button) {
    var PricePlusQuant = parseFloat(button.value);

    if (count === 0) {
        totalPrice += 12.99; 
    } else if (count === 1) {
        currentPrice -= 12.99;
        totalPrice -= 12.99;
    }

    var LastPrice = PricePlusQuant + totalPrice;
    button.value = LastPrice.toFixed(2);

    count++;
    console.log("click1:", count);

    if (count === 1) {
        // button.style.backgroundColor = "grey"; 
    } else {
        // button.style.backgroundColor = "#DE6A6A";
        count = 0;
    }
    document.getElementById("PriceField").value = LastPrice.toFixed(2);
    console.log("New price1:", LastPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = LastPrice.toFixed(2) + '€';
    // console.log("Total price1:", totalPrice1.toFixed(2));
    return LastPrice;
}


///-------------------изменение цвета кнопок сидений----------------------------------------------
function toggleButtonColor(button) {
    var buttons = document.querySelectorAll('.PlaceButton');

    if (button.style.backgroundColor === "grey") {
        button.style.backgroundColor = "#DE6A6A"; // Если текущий цвет серый, то цвет меняется обратно
    } else {
        buttons.forEach(function(btn) {
            btn.style.backgroundColor = "#DE6A6A"; // Возврат цвета для всех кнопок
        });
        button.style.backgroundColor = "grey"; // Изменение цвета для нажатой кнопки
    }
}


