// Carousel: Start
const slides = document.getElementsByClassName('img-item');
const prev = document.getElementById('prev');
const next = document.getElementById('next');
let index = 0;

prev.addEventListener("click", function() {
    prevSlide()
});

next.addEventListener("click", function() {
    nextSlide()
});

function prevSlide() {
    if (index == 0) {
        index = slides.length - 1;
    } else {
        index--;
    }
    changeSlide()
}

function nextSlide() {
    if (index == slides.length - 1) {
        index = 0;
    } else {
        index++;
    }
    changeSlide()
}

function changeSlide() {
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("open");
    }
    slides[index].classList.add("open");
}
// Carousel: End