// fungsi menu bar
let navbar = document.querySelector('.navbar');
document.querySelector('#menu-bar').onclick=() =>{
    navbar.classList.toggle('active');
}

// fungsi swipe produk
var swiper = new Swiper(".product-row", {
  spaceBetween: 40,
  loop:true,
  centeredSlides:true,
  autoplay:{
    delay:5000,
    disableOnInteraction:true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
  
// fungsi swipe review
var swiper = new Swiper(".review-row", {
  spaceBetween: 30,
  loop:true,
  centeredSlides:true,
  autoplay:{
      delay:9500,
      disableOnInteraction:false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});