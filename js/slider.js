var timeoutSlider;
var TICK_COUNT_SLIDE = 3;
var slideIndex = 1;

$(document).ready(function(){
	// $(".slider-compact").slick({
		// arrows: false,
		// speed: 300,
	// });
	
	showSlides(slideIndex);
	startSlideshow();
});

function startSlideshow() {
	timeoutSlider = setTimeout(function(){
		plusSlides(1);
	}, TICK_COUNT_SLIDE * 1000);
}

// Next/previous controls
function plusSlides(n) {
	showSlides(slideIndex += n);
	clearTimeout(timeoutSlider);
	startSlideshow();
}

// Thumbnail image controls
function currentSlide(n) {
	showSlides(slideIndex = n);
	clearTimeout(timeoutSlider);
	startSlideshow();
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("slider-slide");
	var dots = document.getElementsByClassName("dot");
	
	if (n > slides.length) {slideIndex = 1} 
	if (n < 1) {slideIndex = slides.length}
	
	for (i = 0; i < slides.length; i++) {
		slides[i].style.transform = "translateX(-200%)"; 
		slides[i].className = slides[i].className.replace(" fadein", " fadeout");
	}
	
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	
	if (slides.length > slideIndex-1) {
		slides[slideIndex-1].style.transform = "translateX(0)"; 
		// slides[slideIndex-1].style.display = "block"; 
		slides[slideIndex-1].className = slides[slideIndex-1].className.replace(" fadeout", " fadein");
		dots[slideIndex-1].className += " active";
	}
}