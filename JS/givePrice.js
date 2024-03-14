// function ButtonClick(element) {
    
//     let plusPrice = parseFloat(element.value);

//     // document.querySelector('.Text10','.price').innerText = plusPrice.toFixed(2) + '€';

//     let text10Element = document.querySelector('.Text10');
//     text10Element.innerText = plusPrice.toFixed(2) + '€';


//     let priceElement = document.querySelector('.price');
//     priceElement.innerText = plusPrice.toFixed(2) + '€';

    
// }

// function ButtonClick2(element) {

//     let price = parseFloat(element.value);

//     // document.querySelector('.Text10','.price').innerText = price.toFixed(2) + '€';

//     let text10Element = document.querySelector('.Text10');
//     text10Element.innerText = price.toFixed(2) + '€';


//     let priceElement = document.querySelector('.price');
//     priceElement.innerText = price.toFixed(2) + '€';
// }

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
    document.getElementById("PriceField").value = price; // Установка значения скрытого поля
    
    let text10Element = document.querySelector('.Text10');
    text10Element.innerText = price.toFixed(2) + '€';


    let priceElement = document.querySelector('.price');
    priceElement.innerText = price.toFixed(2) + '€';
}