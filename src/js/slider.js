// Déclaration des variables
var sliderContent = document.getElementById('slider-content');
var slide = document.getElementsByClassName('slide');
var slideWidth = slide[0].offsetWidth;
var slideIndex = 0;
var totalSlides = slide.length;
var sliderInterval = setInterval(nextSlide, 5000);
var sliderControls = document.getElementById('slider-controls');
var sliderPrev = document.getElementById('slider-prev');
var sliderNext = document.getElementById('slider-next');
// Fonction pour passer à la slide suivante
function nextSlide() {
	if (slideIndex === totalSlides - 1) {
		slideIndex = 0;
	} else {
		slideIndex++;
	}
	sliderContent.style.marginLeft = '-' + slideWidth * slideIndex + 'px';
}
// Fonction pour passer à la slide précédente
function prevSlide() {
	if (slideIndex === 0) {
		slideIndex = totalSlides - 1;
	} else {
		slideIndex--;
	}
	sliderContent.style.marginLeft = '-' + slideWidth * slideIndex + 'px';
}
// Ajout des événements
sliderPrev.addEventListener('click', function () {
	prevSlide();
	resetInterval();
});
sliderNext.addEventListener('click', function () {
	nextSlide();
	resetInterval();
});
// Fonction pour réinitialiser l'intervalle
function resetInterval() {
	clearInterval(sliderInterval);
	sliderInterval = setInterval(nextSlide, 5000);
}