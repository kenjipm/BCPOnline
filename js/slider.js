var TICK_COUNT_SLIDE = 99999;

$(document).ready(function(){
	// $(".slider-compact").slick({
		// arrows: false,
		// speed: 300,
	// });
	
	showSlides(slideIndex);
	startSlideshow();
});

function startSlideshow() {
	setTimeout(function(){
		plusSlides(1);
		startSlideshow();
	}, TICK_COUNT_SLIDE * 1000);
}

var slideIndex = 1;

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slider-slide");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  if (slides.length > slideIndex-1) {
	  slides[slideIndex-1].style.display = "block"; 
	  dots[slideIndex-1].className += " active";
  }
}