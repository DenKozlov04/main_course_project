function ButtonClick(element) {
    let plusPrice = parseFloat(element.value);
    document.getElementById("PriceField").value = plusPrice; // Установка значения скрытого поля
    
    let text10Element = document.querySelector('.Text10');
    text10Element.innerText = plusPrice.toFixed(2) + '€';


    let priceElement = document.querySelector('.price');
    priceElement.innerText = plusPrice.toFixed(2) + '€';
}

function ButtonClick2(element) {
    let price = parseFloat(element.value);
    document.getElementById("PriceField").value = price; 
    
    let text10Element = document.querySelector('.Text10');
    text10Element.innerText = price.toFixed(2) + '€';


    let priceElement = document.querySelector('.price');
    priceElement.innerText = price.toFixed(2) + '€';
}




var count = 0; 
var totalPrice = 0; 

var count1 = 0; 
var count2 = 0; 
var totalPrice1 = 0; 
var totalPrice2 = 0; 

var count3 = 0; 
var count4 = 0; 
var totalPrice3 = 0; 
var totalPrice4 = 0;

function PlusPrice1(button) {
    var currentPrice = parseFloat(button.value);

    if (count1 === 0) {
        totalPrice1 += 12.99; // Добавление цены за дополнительные киллограммы багажа\ в totalPrice1 
    } else if (count1 === 1) {
        currentPrice -= 12.99; 
        totalPrice1 -= 12.99; 
    }

    var newPrice = currentPrice + totalPrice1;
    button.value = newPrice.toFixed(2);
    
    count1++; 
    console.log("click1:", count1);

    if (count1 === 1) {
        // button.style.backgroundColor = "grey"; 
    } else {
        // button.style.backgroundColor = "#DE6A6A";
        count1 = 0; 
    } 
    
    console.log("New price1:", newPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
    // console.log("Total price1:", totalPrice1.toFixed(2));
}

function PlusPrice2(button) {
    var currentPrice = parseFloat(button.value);

    if (count2 === 0) {
        totalPrice2 += 25.98; 
    } else if (count2 === 1) {
        currentPrice -= 25.98; 
        totalPrice2 -= 25.98; 
    }

    var newPrice = currentPrice + totalPrice2;
    button.value = newPrice.toFixed(2);
    
    count2++; 
    console.log("click2:", count2);

    if (count2 === 1) {
        // button.style.backgroundColor = "grey"; 
    } else {
        // button.style.backgroundColor = "#DE6A6A";
        count2 = 0; 
    } 
    
    console.log("New price2:", newPrice.toFixed(2));
    // console.log("Total price2:", totalPrice2.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
}

function PlusPrice3(button) {
    var currentPrice = parseFloat(button.value);

    if (count3 === 0) {
        totalPrice3 += 38.98; 
    } else if (count3 === 1) {
        currentPrice -= 38.98; 
        totalPrice3 -= 38.98; 
    }

    var newPrice = currentPrice + totalPrice3;
    button.value = newPrice.toFixed(2);
    
    count3++; 
    console.log("click3:", count3);

    if (count3 === 1) {
        // button.style.backgroundColor = "grey"; 
    } else {
        // button.style.backgroundColor = "#DE6A6A";
        count3 = 0; 
    } 
    
    console.log("New price3:", newPrice.toFixed(2));
    // console.log("Total price3:", totalPrice3.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
}

function PlusPrice4(button) {
    var currentPrice = parseFloat(button.value);

    if (count4 === 0) {
        totalPrice4 += 51.98; 
    } else if (count4 === 1) {
        currentPrice -= 51.98; 
        totalPrice4 -= 51.98; 
    }

    var newPrice = currentPrice + totalPrice4;
    button.value = newPrice.toFixed(2);
    
    count4++; 
    console.log("click4:", count4);

    if (count4 === 1) {
        // button.style.backgroundColor = "grey"; 
    } else {
        // button.style.backgroundColor = "#DE6A6A";
        count4 = 0; 
    } 
    
    console.log("New price4:", newPrice.toFixed(2));
    // console.log("Total price4:", totalPrice4.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
}


///изменение цвета кнопок
function toggleButtonColor(button) {
    var buttons = document.querySelectorAll('.Button2, .Button3, .Button4, .Button5');

    if (button.style.backgroundColor === "grey") {
        button.style.backgroundColor = "#DE6A6A"; // Если текущий цвет серый, меняем обратно на основной цвет
    } else {
        buttons.forEach(function(btn) {
            btn.style.backgroundColor = "#DE6A6A"; // Возврат цвета по умолчанию для всех кнопок
        });
        button.style.backgroundColor = "grey"; // Изменение цвета только для нажатой кнопки
    }
}




