
document.addEventListener("DOMContentLoaded", function() {
   
    var ticketForms = document.querySelectorAll('.ticketForm');
    var continueButton = document.querySelector('.ButtonPlace');

    ticketForms.forEach(function(ticketForm) {
        continueButton.style.display = "none";
        var clicked = false;

        ticketForm.addEventListener("click", function() {
           
            var price = this.getAttribute('data-price');
            var id = this.getAttribute('data-id');
    
            var pricePlace = document.getElementById('price');
            var idPlace = document.getElementById('id');
            
           
            pricePlace.innerText = price;
            idPlace.innerText = id;
            
        
            if (clicked) {
                
                clicked = false;
                this.style.border = "2px solid white";
                continueButton.style.display = "none";
            } else {
               
                this.style.border = "2px solid #a6cc61";
                clicked = true;
                continueButton.style.display = "block";
            }
        });
    });
});





