
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




///-------------------seat clolr----------------------------------------------
function toggleButtonColor(button) {
    var activeClass = 'active';
    var buttons = document.querySelectorAll('.PlaceButton');

    var isActive = button.classList.contains(activeClass);

    buttons.forEach(function(btn) {
        btn.classList.remove(activeClass);
        if (!btn.disabled) {
            btn.style.backgroundColor = "#D9D9D9";
        }
    });

    if (!button.disabled) {
        if (isActive) {
            button.style.backgroundColor = "#D9D9D9";
        } else {
       
            button.classList.add(activeClass);
            button.style.backgroundColor = "#DE6A6A";
        }
    }
}



function getAllSeatNumbers() {
   
    var buttons = document.querySelectorAll('.PlaceButton');

    
    var seatNumbers = [];

    
    buttons.forEach(function(button) {
        var seatNumber = button.getAttribute('data-extra-value');

        
        seatNumbers.push(seatNumber);
    });

    
    return seatNumbers;
}

document.addEventListener('DOMContentLoaded', function() {
    var seatNumbers = getAllSeatNumbers();
    console.log("Seat numbers:", seatNumbers);

    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ChildSeatCheck.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log("Response from server:", response);

                
                if (response.error) {
                    console.error("Server error:", response.error);
                    
                } else {
                    
                    response.forEach(function(seat) {
                        var button = document.querySelector('[data-extra-value="' + seat.seatNumber + '"]');
                        if (button) {
                            if (seat.available) {
                                button.disabled = false; 
                            } else {
                                button.style.backgroundColor = "#6495ED"; 
                                button.disabled = true; 
                            }
                        }
                    });
                }
            } else {
                console.error("Server error:", xhr.status);
               
            }
        }
    };
    var data = JSON.stringify({ seatNumbers: seatNumbers, id: flightId });
    xhr.send(data);
});