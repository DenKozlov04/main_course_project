document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".sample-slider", {
        loop: true,
        slidesPerView: 4,
        centeredSlides: true,
        spaceBetween: 15,
        autoplay: {
            delay: 2000,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});