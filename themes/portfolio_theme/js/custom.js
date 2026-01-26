console.log('custom.js loaded');
/* =========================
   Vendor imports
========================= */

// Slider
import Swiper from 'swiper';
import 'swiper/css';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Typed from 'typed.js';
import Isotope from 'isotope-layout';
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';

// Expose libraries to window object
window.Swiper = Swiper;
window.AOS = AOS;
window.Typed = Typed;
window.Isotope = Isotope;
window.GLightbox = GLightbox;

document.addEventListener('DOMContentLoaded', () => {
  GLightbox({ selector: '.glightbox-skill' });
});
/* =========================
   show/hide button
========================= */
// show/hide button
const upBtn = document.createElement('button');
upBtn.innerText = '↑';
upBtn.className = 'scroll-to-top';
document.body.appendChild(upBtn);

window.addEventListener('scroll', () => {
  upBtn.style.opacity = window.scrollY > 300 ? '1' : '0';
});

// smooth scroll
upBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});
