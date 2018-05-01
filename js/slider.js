var timeoutSlider;
var TICK_COUNT_SLIDE = 3;
var slideIndexBefore = 3;
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
		// slides[i].style.transform = "translateX(-200%)"; 
		// slides[i].zIndex = 2;
		slides[i].style.opacity = "0"; 
		// if (i + 1 == slideIndexBefore) {
			slides[i].className = slides[i].className.replace(" fadein", " fadeout");
			// slides[i].zIndex = 3;
		// }
		// console.log("slideIndexBefore: " + slideIndexBefore + ", slideIndex: " + slideIndex);
		
		/*
		1 --> 2 = left
		2 --> 3 = left
		3 --> 1 = left
		
		2 --> 1 = right
		3 --> 2 = right
		1 --> 3 = right
		*/
		/*
		if ((slideIndexBefore == slides.length) && (slideIndex == 1)) { // kalau slide terakhir, terus maju
			slides[i].className = slides[i].className.replace("right", "left");
		}
		else if ((slideIndexBefore == 1) && (slideIndex == slides.length)) { // kalau slide pertama, terus mundur
			slides[i].className = slides[i].className.replace("left", "right");
		}
		else if (slideIndexBefore < slideIndex) { // kalau slide sebelumnya lebih kecil
			slides[i].className = slides[i].className.replace("right", "left");
		}
		else if (slideIndexBefore > slideIndex) { // kalau slide sebelumnya lebih besar
			slides[i].className = slides[i].className.replace("left", "right");
		}
		*/
	}
	
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	
	if (slides.length > slideIndex-1) {
		// slides[slideIndex-1].style.transform = "translateX(0)"; 
		// slides[slideIndex-1].className = slides[slideIndex-1].className.replace(" fadeout", " fadein");
		slides[slideIndex-1].style.opacity = "1"; 
		slides[slideIndex-1].className = slides[slideIndex-1].className.replace(" fadeout", " fadein");
		dots[slideIndex-1].className += " active";
	}
	
	slideIndexBefore = slideIndex;
}