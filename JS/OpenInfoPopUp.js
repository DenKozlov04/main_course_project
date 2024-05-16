// Функция для открытия окна по id
function openModal(id) {
    var modal = document.getElementById(id);
    modal.style.display = "block";
}

// Функция для закрытия окна по id
function closeModal(id) {
    var modal = document.getElementById(id);
    modal.style.display = "none";
}
//------------------скрывает кнопку------------------------------
// var userPhoneData = <?php echo json_encode(displayUserPhone()); ?>;

// if (userPhoneData.button_visibility === 'hidden') {
//     hideButton('editButton');
// }

// function hideButton(buttonId) {
//     var button = document.getElementById(buttonId);
//     if (button) {
//         button.style.display = 'none';
//     }
// }

// if (visibility === 'hidden') {
//     hideButton('editButton');
// }

// function hideButton(buttonId) {
//     var button = document.getElementById(buttonId);
//     if (button) {
//         button.style.display = 'none';
//     }
// }
// document.getElementById("editButton").style.display="none";
