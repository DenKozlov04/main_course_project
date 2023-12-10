document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('mySlider');
    const valueDisplay = document.getElementById('sliderValue');

    // Обработчик изменения значения ползунка
    slider.addEventListener('input', function () {
        const sliderValue = slider.value;
        valueDisplay.textContent = sliderValue;
        // Здесь вы можете добавить дополнительную логику в соответствии с вашими требованиями
    });
});
