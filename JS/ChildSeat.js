function PlusChildSeatPrice(button) {
    // Предотвращаем обновление страницы
    event.preventDefault();

    // Получаем цену и название места
    var price = button.querySelector('.PricePlace').innerText;
    var placeName = button.querySelector('.SeatLocation').innerText;

    // Выводим значения в консоль
    console.log("Цена: " + price);
    console.log("Название места: " + placeName);

    // Присваиваем значения скрытым полям формы
    document.getElementById('priceField').value = price;
    document.getElementById('placeNameField').value = placeName;
}
function toggleButtonColor(button){
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