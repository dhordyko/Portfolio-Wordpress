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

import GLightbox from "glightbox";
import "glightbox/dist/css/glightbox.css"; // only works if your build extracts CSS

const initSkillCards = () => {
	GLightbox({
		selector: ".skill-card.glightbox, .glightbox-skill",
		openEffect: "fade",
		closeEffect: "fade",
		moreText: "Read more",
		moreLength: 1000, // characters before truncation
	});
};

if (document.readyState === "loading") {
	document.addEventListener("DOMContentLoaded", initSkillCards);
} else {
	initSkillCards();
}
