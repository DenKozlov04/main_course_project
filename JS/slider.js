document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('mySlider');
    const valueDisplay = document.getElementById('sliderValue');

    // изминение значения ползунка 
    slider.addEventListener('input', function () {
        const sliderValue = slider.value;
        valueDisplay.textContent = sliderValue;
        
    });
});
