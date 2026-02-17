/* =========================
   Vendor imports
========================= */

// Slider
import Swiper from 'swiper';
import 'swiper/css';

import Typed from 'typed.js';
import 'glightbox/dist/css/glightbox.css';
import ScrollReveal from 'scrollreveal';
// Expose libraries to window object
window.Swiper = Swiper;

window.Typed = Typed;

/* =========================
   show/hide button
========================= */

const upBtn = document.querySelector('#up-to-top');

if (upBtn) {
  window.addEventListener('scroll', () => {
    upBtn.style.opacity = window.scrollY > 300 ? '1' : '0';
  });

  upBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}
/* =========================
   reveal on scroll
========================= */
const sr = ScrollReveal({
  duration: 1500,
  distance: '250px',
  easing: 'ease-out',
  reset: false,
});

sr.reveal('.sr-up', { origin: 'bottom' });
sr.reveal('.sr-left', { origin: 'left' });
sr.reveal('.sr-right', { origin: 'right' });

/* =========================
   toggle click
========================= */

jQuery(function ($) {
  // $ safely works here

  $('.burger').on('click', function () {
    $('header').toggleClass('is-open');
    $(this).toggleClass('is-open');
  });
});
