// Mobile menu
var mobileBtn = document.querySelector('.mobile-btn');
var navMenu = document.querySelector('.nav-menu');
var closeBtn = document.querySelector('.close-btn');
var overlay = document.querySelector('.overlay');

mobileBtn.addEventListener('click', function(){
  navMenu.className += ' open';
  overlay.className += ' open';
});

closeBtn.addEventListener('click', function(){
  navMenu.className = 'nav-menu';
  overlay.className = 'overlay';
});

window.addEventListener('click', function(event){
  if(event.target === overlay){
    navMenu.className = 'nav-menu';
    overlay.className = 'overlay';
  }
});

// Shrink header on scroll
var header, yPos;

function yScroll(){
  header = document.querySelector('header.shrink');
  headerGrid = document.querySelector('.header-grid');
  brand = document.querySelector('.brand img');
  siteNav = document.querySelector('.site-nav');
  yPos = window.pageYOffset;

  if(yPos > 150) {
    header.style.height = '75px';
    headerGrid.style.paddingTop = '0';
    brand.style.width = '180px';
    siteNav.style.fontSize = '1.1rem';
  } else {
    header.style.height = '90px';
    headerGrid.style.paddingTop = '0.3rem';
    brand.style.width = '225px';
    siteNav.style.fontSize = '1.2rem';
  }
}
window.addEventListener('scroll', yScroll);
