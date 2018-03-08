// Check for mobile device
var isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

// Parallax showcase image on desktop
var parallax = document.querySelector(".showcase, .showcase-banner");

if(!isMobile){
  window.addEventListener("scroll", function() {

    // Record distance scrolled from top
    var scrolledHeight = window.pageYOffset,
    limit = parallax.offsetTop + parallax.offsetHeight;

    // Only update background-position when everything above element is off viewport
    // Stop updating when element out of viewport with limit
    if(scrolledHeight > parallax.offsetTop && scrolledHeight <= limit) {
      // Update background-position of parallax element to opposite direction of scroll
      // Divide by 1.5 to slow down effect
      parallax.style.backgroundPositionY = (scrolledHeight - parallax.offsetTop) / 1.5 + "px";
      } else {
        parallax.style.backgroundPositionY =  "0";
      }
  });
}
