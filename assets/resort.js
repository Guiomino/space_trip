let currentIndex = 0;

function changeSlide(n) {
    currentIndex += n;
    showSlide();
}

function showSlide() {
    const slides = document.querySelector('.sliderList');
    const slideItems = slides.children;

    if (currentIndex < 0) {
        currentIndex = slideItems.length - 1;
    } else if (currentIndex >= slideItems.length) {
        currentIndex = 0;
    }

    for (let i = 0; i < slideItems.length; i++) {
        slideItems[i].style.display = 'none';
    }

    slideItems[currentIndex].style.display = 'block';
}

document.addEventListener("DOMContentLoaded", showSlide);







document.getElementById("prevBtn").addEventListener("click", function() {
    changeSlide(-1);
});

document.getElementById("nextBtn").addEventListener("click", function() {
    changeSlide(1);
});