document.addEventListener("DOMContentLoaded", function() {

    var ticketForms = document.querySelectorAll('.ticketForm');

  
    ticketForms.forEach(function(ticketForm) {
        //значение кнопки билета по умолчанию
        var clicked = false;

        ticketForm.addEventListener("click", function() {
            //значения из элеммента
            var price = this.getAttribute('data-price');
            var id = this.getAttribute('data-id');
            
    
            var pricePlace = document.getElementById('price');
            var idPlace = document.getElementById('id');
            
            // Обновленный контент элемментов PricePlace и idPlace
            pricePlace.innerText = price;
            idPlace.innerText = id;

        
            if (clicked) {
                // Если билет был уже выбран
                clicked = false;
                this.style.border = "2px solid white";
            } else {
                // Если билет не был выбран
                this.style.border = "2px solid #a6cc61";
                clicked = true;
            }
        });
    });
});







