///------------------------Добавление цены в файле PriceСonfirmation.php ----------------------------------
function ButtonClick2(element) {
    let price = parseFloat(element.value);
    document.getElementById("PriceField").value = price; 
    
    let text10Element = document.querySelector('.Text10');
    text10Element.innerText = price.toFixed(2) + '€';


    let priceElement = document.querySelector('.price');
    priceElement.innerText = price.toFixed(2) + '€';
}


function ButtonClick(element) {
    let plusPrice = parseFloat(element.value);
    document.getElementById("PriceField").value = plusPrice; // Установка значения скрытого поля
    
    let text10Element = document.querySelector('.Text10');
    text10Element.innerText = plusPrice.toFixed(2) + '€';


    let priceElement = document.querySelector('.price');
    priceElement.innerText = plusPrice.toFixed(2) + '€';
}




///------------------------Код кнопок на BaggagePrice.php ----------------------------------

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
    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price1:", newPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
    // console.log("Total price1:", totalPrice1.toFixed(2));
    return newPrice;
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
    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price2:", newPrice.toFixed(2));
    // console.log("Total price2:", totalPrice2.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
    
    return newPrice;
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
    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price3:", newPrice.toFixed(2));
    // console.log("Total price3:", totalPrice3.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';
    return newPrice;
}

function PlusPrice4(button) {
    var currentPrice = parseFloat(button.value);

    if (count4 === 0) {
        totalPrice4 += 51.98; 
    } else if (count4 === 1) {
        currentPrice -= 51.98; 
        totalPrice4 -= 51.98; 
    }
    document.getElementById("PriceField2").value = newPrice.toFixed(2);
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
    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price4:", newPrice.toFixed(2));
    // console.log("Total price4:", totalPrice4.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';

    return newPrice;
}


///-------------------изменение цвета кнопок----------------------------------------------
function toggleButtonColor(button) {
    var buttons = document.querySelectorAll('.Button2, .Button3, .Button4, .Button5');

    if (button.style.backgroundColor === "grey") {
        button.style.backgroundColor = "#DE6A6A"; // Если текущий цвет серый, то цвет меняется обратно
    } else {
        buttons.forEach(function(btn) {
            btn.style.backgroundColor = "#DE6A6A"; // Возврат цвета для всех кнопок
        });
        button.style.backgroundColor = "grey"; // Изменение цвета для нажатой кнопки
    }
}

///-------------------Второе добавление цены----------------------------------------------


let num = 0; // num
let regPrice = 0;// цена за 1 штуку регестрированного багажа, весом 24 кг

function ButtonClick2(button) {
    var currentPrice = parseFloat(button.value);
    if (num < 4) {
        num = num + 1;
        regPrice = regPrice + 29.99;
        newPrice2 = currentPrice + regPrice;
        console.log(num); // Вывод значения num в консоль
        if (num >= 4) {
            document.getElementById("choose33").style.backgroundColor = "grey";
        } else {
            document.getElementById("choose33").style.backgroundColor = "#DE6A6A";
        }
    }
    if (num < 4) {
        document.getElementById("choose22").style.backgroundColor = "#DE6A6A";
    }
    document.querySelector('.txt9').innerText = "+" + regPrice.toFixed(2) + "€";
    document.querySelector('.quantity').innerText = num;
    document.getElementById("PriceField2").value = newPrice2.toFixed(2);
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice2 .toFixed(2) + '€';
}

function ButtonClick1(button) {
    var currentPrice = parseFloat(button.value);
    if (num > 0) {
        num = num - 1;
        regPrice = regPrice - 29.99;
        newPrice2 = currentPrice - regPrice;
        console.log(num); 
        if (num <= 0) {
            document.getElementById("choose22").style.backgroundColor = "grey";
        } else {
            document.getElementById("choose22").style.backgroundColor = "#DE6A6A";
        }
    }
    if (num > 0) {
        document.getElementById("choose33").style.backgroundColor = "#DE6A6A";
    }
    document.querySelector('.txt9').innerText = "+" + regPrice.toFixed(2) + "€";
    document.querySelector('.quantity').innerText = num;
    document.getElementById("PriceField2").value = newPrice2.toFixed(2);
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice2 .toFixed(2) + '€';
    // console.log("Price for Register Baggage:", newPrice2 .toFixed(2) + '€');
}

document.querySelector('.txt9').innerText = "+" + regPrice.toFixed(2) + "€";
document.querySelector('.quantity').innerText = num;
document.getElementById("PriceField2").value = newPrice2.toFixed(2);
let priceElement = document.querySelector('.price');
priceElement.innerText = newPrice2 .toFixed(2) + '€';
// console.log("Price for Register Baggage:", newPrice2);



