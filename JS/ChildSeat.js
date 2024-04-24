
function PlusChildSeatPrice(button) {
    event.preventDefault();
    
    var price = button.querySelector('.PricePlace').innerText;
    var placeName = button.querySelector('.SeatLocation').innerText;

   
    console.log("price: " + price);
    console.log("seat: " + placeName);

   
    document.getElementById('AddChildrenPrice').value = price;
    document.getElementById('AddChildrenPlaceName').value = placeName;

  
    // document.querySelector('.AddChildrenForm').submit();
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
       
        button.classList.add(activeClass);
        button.style.backgroundColor = "#DE6A6A";
    } 
}