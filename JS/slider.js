document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('mySlider');
    const valueDisplay = document.getElementById('sliderValue');

    slider.addEventListener('input', function () {
        const sliderValue = slider.value;
        valueDisplay.textContent = sliderValue;
        
    });
});
