var slideIndex = 0;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("BannerCont");
    var dots = document.getElementsByClassName("Dot");

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";        
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }   

    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" Active", "");
    }

    slides[slideIndex - 1].style.display = "block"; 
    dots[slideIndex-1].className += " Active";
    //Change image every 2 seconds
    setTimeout(showSlides, 5000);
}