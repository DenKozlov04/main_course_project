

    document.addEventListener("DOMContentLoaded", function() {
        var continueButton = document.querySelector('.ContinueButton');
        var pricePlace = document.getElementById('price');
        var idPlace = document.getElementById('id');
        
        continueButton.addEventListener('click', function(event) {
            var price = pricePlace.innerText;
            var id = idPlace.innerText;
            
            var form = continueButton.closest('form');
            
            form.action = 'details1.php'; 
            form.method = 'POST'; 
            
            var priceInput = document.createElement('input');
            priceInput.type = 'hidden';
            priceInput.name = 'price';
            priceInput.value = price;
            form.appendChild(priceInput);
            
            var idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = id;
            form.appendChild(idInput);
            
            form.submit();
        });
    });
