/******/ (() => { // webpackBootstrap
/*!************************************!*\
  !*** ./src/block-projects/view.js ***!
  \************************************/
/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */
const initPortfolioBlock = () => {
  console.log('Initializing portfolio block with AOS and Isotope...');

  // Initialize AOS (Animate On Scroll)
  if (window.AOS) {
    console.log('Initializing AOS...');
    window.AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      offset: 100
    });
    console.log('AOS initialized');
  } else {
    console.error('AOS not found on window object');
  }

  // Initialize Isotope
  if (window.Isotope) {
    console.log('Initializing Isotope...');
    const isotopeContainers = document.querySelectorAll('.isotope-layout');
    isotopeContainers.forEach(container => {
      const isotope = new window.Isotope(container.querySelector('.isotope-container'), {
        itemSelector: '.portfolio-item',
        layoutMode: 'masonry',
        masonry: {
          columnWidth: '.portfolio-item'
        }
      });

      // Filter functionality
      const filterButtons = container.querySelectorAll('.isotope-filters li');
      filterButtons.forEach(button => {
        button.addEventListener('click', function () {
          // Remove active class from all buttons
          filterButtons.forEach(btn => btn.classList.remove('filter-active'));
          // Add active class to clicked button
          this.classList.add('filter-active');

          // Get filter value
          const filterValue = this.getAttribute('data-filter');
          console.log('Filtering by:', filterValue);

          // Apply Isotope filter
          isotope.arrange({
            filter: filterValue
          });

          // Refresh AOS for newly visible elements
          if (window.AOS) {
            window.AOS.refresh();
          }
        });
      });
      console.log('Isotope initialized for container:', container);
    });
  } else {
    console.error('Isotope not found on window object');
  }
};

// Wait for libraries to be available
const waitForLibraries = (attempt = 0) => {
  if (attempt > 50) {
    // 5 seconds timeout
    console.error('Libraries failed to load after 5 seconds');
    return;
  }
  if (window.AOS && window.Isotope) {
    console.log('All libraries available, initializing portfolio block');
    initPortfolioBlock();
  } else {
    console.log('Waiting for libraries... attempt', attempt + 1);
    setTimeout(() => waitForLibraries(attempt + 1), 100);
  }
};

// Initialize on document ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', waitForLibraries);
} else {
  waitForLibraries();
}
/******/ })()
;
//# sourceMappingURL=view.js.map