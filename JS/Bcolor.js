

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
// var count = 0;
// var totalPrice = 0;

// function PlusSeatPrice(button) {
//     var PricePlusQuant = parseFloat(button.value);

//     if (count === 0) {
//         totalPrice += 19.99; 
//     } else if (count === 1) {
//         PricePlusQuant -= 19.99;
//         totalPrice -= 19.99;
//     }

//     var LastPrice = PricePlusQuant + totalPrice;
//     button.value = LastPrice.toFixed(2);

//     count++;
//     console.log("click1:", count);

//     if (count === 1) {
//         // button.style.backgroundColor = "grey"; 
//     } else {
//         // button.style.backgroundColor = "#DE6A6A";
//         count = 0;
//     }
//     document.getElementById("PriceField").value = LastPrice.toFixed(2);
//     console.log("New price1:", LastPrice.toFixed(2));
//     let priceElement = document.querySelector('.price');
//     priceElement.innerText = LastPrice.toFixed(2) + '€';
//     // console.log("Total price1:", totalPrice1.toFixed(2));
//     return LastPrice;
// }

// var count1 = 0;
// var totalPrice1 = 0;

// function PlusSeatPrice1(button) {
//     var PricePlusQuant = parseFloat(button.value);

//     if (count1 === 0) {
//         totalPrice1 += 19.99; 
//     } else if (count1 === 1) {
//         PricePlusQuant -= 19.99;
//         totalPrice1 -= 19.99;
//     }

//     var LastPrice = PricePlusQuant + totalPrice1;
//     button.value = LastPrice.toFixed(2);

//     count1++;
//     console.log("click1:", count1);

//     if (count1 === 1) {
//         // button.style.backgroundColor = "grey"; 
//     } else {
//         // button.style.backgroundColor = "#DE6A6A";
//         count1 = 0;
//     }
//     document.getElementById("PriceField").value = LastPrice.toFixed(2);
//     console.log("New price1:", LastPrice.toFixed(2));
//     let priceElement = document.querySelector('.price');
//     priceElement.innerText = LastPrice.toFixed(2) + '€';
//     // console.log("Total price1:", totalPrice1.toFixed(2));
//     return LastPrice;
// }
///-----------------------------код для колонки А------------------------------------------------
// var count = 0;
// var totalPrice = 0;


function PlusSeatPrice(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";

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
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}
///-----------------------------код для колонки В------------------------------------------------

function PlusSeatPrice2(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";

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
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}
///-----------------------------код для колонки A2------------------------------------------------

function PlusSeatPrice3(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";

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
    priceElement.innerText = PricePlusQuant.toFixed(2) + '€';

    return PricePlusQuant;
}

///-----------------------------код для колонки В2------------------------------------------------

function PlusSeatPrice4(button) {
    var PricePlusQuant = parseFloat(button.value);
    var clicked = button.getAttribute('data-clicked') === "true";

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
        btn.style.backgroundColor = "#D9D9D9";
    });

    
    if (isActive) {
        button.style.backgroundColor = "#D9D9D9";
    } else {
        // Иначе, выделяем текущую кнопку
        button.classList.add(activeClass);
        button.style.backgroundColor = "#DE6A6A";
    }
}







