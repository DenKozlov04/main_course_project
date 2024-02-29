
// открывает поп ап
function openPopup(departureTime, arrivalTime, ITADA, price) {
    var popup = document.getElementById('popup');
    var popupContent = document.getElementById('popupContent');
    var overlay = document.getElementById('overlay');
    // содержимое попапа в соответствии с данными 
    popupContent.innerHTML = `
        <div>Departure Time: ${departureTime}</div>
        <div>Arrival Time: ${arrivalTime}</div>
        <div>ITADA: ${ITADA}</div>
        <div>Price: ${price}</div>`;
    // вывод поп апа
    popup.style.display = 'block';
    overlay.style.display = 'block';
}

function closePopup() {
    var popup = document.getElementById('popup');
    // поп ап убран
    popup.style.display = 'none';
    overlay.style.display = 'none';
}
