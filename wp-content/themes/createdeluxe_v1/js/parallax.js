// Check for mobile device
var isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

// Parallax showcase image on desktop
var parallax= document.querySelector(".showcase, .showcase-banner");

if(!isMobile){
  window.addEventListener("scroll", function() {

    var scrolledHeight= window.pageYOffset,
                  limit= parallax.offsetTop+ parallax.offsetHeight;

    if(scrolledHeight > parallax.offsetTop && scrolledHeight <= limit) {
      parallax.style.backgroundPositionY=  (scrolledHeight - parallax.offsetTop) /1.5+ "px";
      } else {
        parallax.style.backgroundPositionY=  "0";
      }
  });
}
