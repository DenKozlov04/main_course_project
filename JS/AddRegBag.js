// Функция для закрытия окна по id
// function OpenPlace(id) {
//     var obj = document.getElementById(id);
//     obj.style.display = "none";
// }


// function ClosePlace(id) {
//     var obj = document.getElementById(id);
//     obj.style.display = "block";
// }



let num = 0; // num
let regPrice = 0;// цена за 1 штуку регестрированного багажа, весом 24 кг

function ButtonClick2(button) {
    if (num < 4) {
        num = num + 1;
        regPrice = regPrice + 29.99;
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
}

function ButtonClick1(button) {
    if (num > 0) {
        num = num - 1;
        regPrice = regPrice - 29.99;
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
}

document.querySelector('.txt9').innerText = "+" + regPrice.toFixed(2) + "€";
document.querySelector('.quantity').innerText = num;


