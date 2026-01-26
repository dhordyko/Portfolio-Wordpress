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

// const initSkillCards = () => {
// 	console.log( 'Initializing skill cards with GLightbox...' );
	
// 	if ( ! window.GLightbox ) {
// 		console.error( 'GLightbox not found on window object' );
// 		return;
// 	}
	
// 	console.log( 'GLightbox object:', window.GLightbox );
	
// 	const glightbox = window.GLightbox( {
// 		selector: '.skill-card.glightbox',
// 		openEffect: 'fadeIn',
// 		closeEffect: 'fadeOut',
// 	} );
	
// 	console.log( 'GLightbox instance created:', glightbox );
// };

// // Wait for GLightbox to be available (it's loaded from the theme's custom.js)
// const waitForGLightbox = ( attempt = 0 ) => {
// 	if ( attempt > 50 ) { // 5 seconds timeout
// 		console.error( 'GLightbox failed to load after 5 seconds' );
// 		return;
// 	}
	
// 	if ( window.GLightbox ) {
// 		console.log( 'GLightbox available, initializing skill cards' );
// 		initSkillCards();
// 	} else {
// 		console.log( 'Waiting for GLightbox... attempt', attempt + 1 );
// 		setTimeout( () => waitForGLightbox( attempt + 1 ), 100 );
// 	}
// };

// // Initialize on document ready or immediately if DOM is ready
// if ( document.readyState === 'loading' ) {
// 	document.addEventListener( 'DOMContentLoaded', waitForGLightbox );
// } else {
// 	waitForGLightbox();
// }
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css'; // only works if your build extracts CSS

const initSkillCards = () => {
  GLightbox({
    selector: '.skill-card.glightbox, .glightbox-skill',
    openEffect: 'fade',
    closeEffect: 'fade',
  });
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initSkillCards);
} else {
  initSkillCards();
}
