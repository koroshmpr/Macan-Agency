import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
document.addEventListener('DOMContentLoaded', function () {
    const portfolio = new Swiper('.landing-portfolio', {
        effect: 'slide',
        speed: 8000, // Increase speed to make the transition smooth
        loop: true,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        slidesPerView: 1.2,
        spaceBetween: 0,
        centeredSlides: true, // Center slides for a smoother continuous effect
        direction: 'horizontal',
        loopAdditionalSlides: 4.8, // Add additional slides to make the loop smoother
        breakpoints: {
            768: {
                slidesPerView: 4.8,
            },
        },
    });

    const customers = new Swiper('.landing-customers', {
        effect: 'slide',
        speed: 1500,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        slidesPerView: 3,
        slidesPerGroup: 3, // Slide 3 items per autoplay cycle on mobile
        spaceBetween: 10,
        centeredSlides: false,
        direction: 'horizontal',
        pagination: {
            el: '.landing-pagination',
            bulletActiveClass: 'active',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 6,
                slidesPerGroup: 6, // Slide 6 items per autoplay cycle on desktop
            },
        },
        loopedSlides: 6, // To ensure smooth looping (should be set to the maximum number of slidesPerView)
    });

})