<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
    <div class="numbertext">1 /5</div>
    <img src="https://cnet2.cbsistatic.com/img/9Nn-GIfn1e6RjR-_zpegY62M8ps=/940x528/2018/11/16/4558d152-e426-4078-b2eb-8b73e7afbdd0/lamborghini-sc18-hero.jpg
    " width="1000" height="500">
    <div class="text">Lamborghini</div>
    </div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTBjOsDR9smqACVIp96eO4AVgBhcP0yvWF3lA&usqp=CAU
  " width="1000" height="500">
  <div class="text">BMW</div>
</div>



<div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="https://picture1.goo-net.com/070/0708635/J/0708635A20201017G00108.jpg
    " width="1000" height="500">
    <div class="text">Nissan</div>
  </div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="https://media.magazine.ferrari.com/images/2020/09/24/133935008-5b84b441-b62d-4587-bb1a-2946a7bf7e79.jpg
  " width="1000" height="500">
  <div class="text">Ferrari</div>
</div>

<div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="https://www.nissan-global.com/COMMON/IMAGES/NISSAN/Z/Z34-012.jpg
    " width="1000" height="500">
    <div class="text">Sample</div>
  </div>

<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a> -->
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
