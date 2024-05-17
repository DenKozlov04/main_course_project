// function openModal(button, modalId) {
//     var id = button.getAttribute('data-id');
//     var modal = document.getElementById(modalId);
//     var modalContent = modal.querySelector('.id-placeholder');
//     modalContent.textContent = id; 
//     modal.style.display = 'block';
// }
function openModal(button, modalId) {
    var id = button.getAttribute('data-id');
    var modal = document.getElementById(modalId);
    var modalContent = modal.querySelector('.id-placeholder');

   
    var flightIdInput = modalId === 'modal1' ? document.getElementById('flightIdInputEdit') : document.getElementById('flightIdInputDelete');
    flightIdInput.value = id;

    modalContent.textContent = id;
    modal.style.display = 'block';
}


function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'none';
}

window.onclick = function(event) {
    var modal1 = document.getElementById('modal1');
    var modal2 = document.getElementById('modal2');
    if (event.target == modal1) {
        modal1.style.display = 'none';
    }
    if (event.target == modal2) {
        modal2.style.display = 'none';
    }
}