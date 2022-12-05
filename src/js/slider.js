$(document).ready(function() {
	// Déclaration des variables
	var sliderContent = $('#slider-content');
	var slide = $('.slide');
	var slideWidth = slide[0]?slide[0].offsetWidth:0;
	var slideIndex = 0;
	var totalSlides = slide.length;
	var sliderInterval = setInterval(nextSlide, 5000);
	var sliderPrev = $('#slider-prev');
	var sliderNext = $('#slider-next');
	// Fonction pour passer à la slide suivante
	function nextSlide() {
		if (slideIndex === totalSlides - 1) {
			slideIndex = 0;
		} else {
			slideIndex++;
		}
		sliderContent.css('margin-left', '-' + slideWidth * slideIndex + 'px');
	}
	// Fonction pour passer à la slide précédente
	function prevSlide() {
		if (slideIndex === 0) {
			slideIndex = totalSlides - 1;
		} else {
			slideIndex--;
		}
		sliderContent.css('margin-left', '-' + slideWidth * slideIndex + 'px');
	}
	// Ajout des événements
	sliderPrev.click(function() {
		prevSlide();
		resetInterval();
	});
	sliderNext.click(function() {
		nextSlide();
		resetInterval();
	});
	// Fonction pour réinitialiser l'intervalle
	function resetInterval() {
		clearInterval(sliderInterval);
		sliderInterval = setInterval(nextSlide, 5000);
	}
});
