document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".sample-slider2", {
        loop: true,
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 0,
        autoplay: {
            delay: 10500,
        },
        pagination: {
            el: ".swiper-pagination2",
        },
    });
});