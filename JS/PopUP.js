
// открывает поп ап
function openPopup(country, City, airport_name, ITADA, departure_date, arrival_date, departureTime, arrivalTime, price ) {
    
    var popup = document.getElementById('popup');
    var popupContent = document.getElementById('popupContent');
    var overlay = document.getElementById('overlay');
    // содержимое попапа в соответствии с данными 
    popupContent.innerHTML = `
        <div>Country: ${country}</div>
        <div>City: ${City}</div>
        <div>Airportname: ${airport_name}</div>
        <div>ITADA: ${ITADA}</div>
        <div>Departure date: ${departure_date}</div>
        <div>Arrival date: ${arrival_date}</div>
        <div>Departure Time: ${departureTime}</div>
        <div>Arrival Time: ${arrivalTime}</div>
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
