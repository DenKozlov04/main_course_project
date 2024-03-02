// document.addEventListener('DOMContentLoaded', function () {
//     var colorButtons = document.querySelectorAll('.ticketForm');
//     var selectedValueElement = document.getElementById('selectedValue');

//     colorButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
         
//             button.classList.toggle('selected');

   
//             var currentValue = button.getAttribute('data-price');
//             var idValue = button.getAttribute('data-id');

  
//             if (button.classList.contains('selected')) {
              
//                 selectedValueElement.textContent = `ID: ${idValue}, Price: ${currentValue}`;
//             } else {
               
//                 selectedValueElement.textContent = '';
//             }
//         });
//     });
// });
///НЕ РАБОТАЕТ