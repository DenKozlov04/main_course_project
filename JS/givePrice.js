///------------------------ PriceСonfirmation.php price add----------------------------------
function updatePrice(element) {
    let price;
    if (element.id === 'circleSelect') {
        price = parseFloat(document.getElementById('OriginalPriceField').value);
    } else {
        price = parseFloat(element.value);
    }

    document.getElementById("PriceField").value = price; 

    let text10Element = document.querySelector('.Text10');
    text10Element.innerText = price.toFixed(2) + '€';

    let headerPriceElement = document.getElementById('headerPrice');
    headerPriceElement.innerText = price.toFixed(2) + '€';
}





///------------------------ BaggagePrice.php bttns----------------------------------



var count1 = 0;
var count2 = 0;
var count3 = 0;
var count4 = 0;

var totalPrice1 = 0;
var totalPrice2 = 0;
var totalPrice3 = 0;
var totalPrice4 = 0;

var LuggageСabin = 0;

var LuggageСompartment = 0;

function updateHiddenInput(name, value) {
    document.querySelector(`input[name='${name}']`).value = value;
}

function PlusPrice1(button) {
    var currentPrice = parseFloat(button.value);

    if (count1 === 0) {
        totalPrice1 += 12.99;
        LuggageСabin = 2;
        button.style.backgroundColor = "grey"; 
    } else if (count1 === 1) {
        currentPrice -= 12.99;
        totalPrice1 -= 12.99;
        LuggageСabin = 0;
        button.style.backgroundColor = "#DE6A6A"; 
    }

    var newPrice = currentPrice + totalPrice1;
    button.value = newPrice.toFixed(2);

    count1 = 1 - count1; 
    console.log("click1:", count1);

    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price1:", newPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';

    updateHiddenInput('LuggageСabin', LuggageСabin);

    return newPrice;
}

function PlusPrice2(button) {
    var currentPrice = parseFloat(button.value);

    if (count2 === 0) {
        totalPrice2 += 25.98;
        LuggageСabin = 3;
        button.style.backgroundColor = "grey";
    } else if (count2 === 1) {
        currentPrice -= 25.98;
        totalPrice2 -= 25.98;
        LuggageСabin = 0;
        button.style.backgroundColor = "#DE6A6A";
    }

    var newPrice = currentPrice + totalPrice2;
    button.value = newPrice.toFixed(2);

    count2 = 1 - count2;
    console.log("click2:", count2);

    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price2:", newPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';

    updateHiddenInput('LuggageСabin', LuggageСabin);

    return newPrice;
}

function PlusPrice3(button) {
    var currentPrice = parseFloat(button.value);

    if (count3 === 0) {
        totalPrice3 += 38.98;
        LuggageСabin = 4;
        button.style.backgroundColor = "grey";
    } else if (count3 === 1) {
        currentPrice -= 38.98;
        totalPrice3 -= 38.98;
        LuggageСabin = 0;
        button.style.backgroundColor = "#DE6A6A";
    }

    var newPrice = currentPrice + totalPrice3;
    button.value = newPrice.toFixed(2);

    count3 = 1 - count3;
    console.log("click3:", count3);

    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price3:", newPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';

    updateHiddenInput('LuggageСabin', LuggageСabin);

    return newPrice;
}

function PlusPrice4(button) {
    var currentPrice = parseFloat(button.value);

    if (count4 === 0) {
        totalPrice4 += 51.98;
        LuggageСabin = 5;
        button.style.backgroundColor = "grey";
    } else if (count4 === 1) {
        currentPrice -= 51.98;
        totalPrice4 -= 51.98;
        LuggageСabin = 0;
        button.style.backgroundColor = "#DE6A6A";
    }

    var newPrice = currentPrice + totalPrice4;
    button.value = newPrice.toFixed(2);

    count4 = 1 - count4;
    console.log("click4:", count4);

    document.getElementById("PriceField2").value = newPrice.toFixed(2);
    console.log("New price4:", newPrice.toFixed(2));
    let priceElement = document.querySelector('.price');
    priceElement.innerText = newPrice.toFixed(2) + '€';

    
    updateHiddenInput('LuggageСabin', LuggageСabin);

    return newPrice;
}



let num = 0; // num
let regPrice = 0; 

function ButtonClick2(button) {
    var currentPrice = parseFloat(button.value);
    if (num < 4) {
        num = num + 1;
        regPrice = regPrice + 29.99;
        newPrice2 = currentPrice + regPrice;
        console.log(num); 
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
    priceElement.innerText = newPrice2.toFixed(2) + '€';

    
    LuggageСompartment = 2 + num; 
    updateHiddenInput('LuggageСompartment', LuggageСompartment);
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
    priceElement.innerText = newPrice2.toFixed(2) + '€';

    
    LuggageСompartment = 2 + num; 
    updateHiddenInput('LuggageСompartment', LuggageСompartment);
}


document.querySelector('.txt9').innerText = "+" + regPrice.toFixed(2) + "€";
document.querySelector('.quantity').innerText = num;
document.getElementById("PriceField2").value = newPrice2.toFixed(2);
let priceElement = document.querySelector('.price');
priceElement.innerText = newPrice2.toFixed(2) + '€';
