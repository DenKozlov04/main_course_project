function PlusChildSeatPrice(button) {
    var price = button.querySelector('.PricePlace').innerText;
    var placeName = button.querySelector('.SeatLocation').innerText;

    document.getElementById('priceField').value = price;
    document.getElementById('placeNameField').value = Seat;
}
