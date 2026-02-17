import Isotope from "isotope-layout";
import imagesLoaded from "imagesloaded";

document.addEventListener("DOMContentLoaded", () => {
	document.querySelectorAll(".isotope-layout").forEach((container) => {
		const grid = container.querySelector(".isotope-container");
		if (!grid) return;

		const iso = new Isotope(grid, {
			itemSelector: ".portfolio-item",
			layoutMode: "masonry",
			percentPosition: true,
			masonry: {
				// ✅ If you are not 100% sure grid-sizer exists & has width, use ".portfolio-item"
				columnWidth: ".grid-sizer", // change to ".portfolio-item" if needed
				gutter: 0,
			},
		});

		// ✅ Safe relayout helper (handles “scroll into view” + AOS timing)
		const relayout = () => {
			requestAnimationFrame(() => {
				requestAnimationFrame(() => {
					iso.layout();
				});
			});
		};

		// ✅ Layout as images load
		const imgLoad = imagesLoaded(grid);
		imgLoad.on("progress", relayout);
		imgLoad.on("always", relayout);

		// ✅ Final safety relayout after full load + fonts (fonts can change heights)
		window.addEventListener("load", relayout);
		document.fonts?.ready?.then(relayout);

		// ✅ Key fix: when grid enters viewport, force a relayout once
		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						relayout();
						observer.disconnect(); // run once
					}
				});
			},
			{ root: null, threshold: 0.15 },
		);

		// Observe the container or grid (either works)
		observer.observe(container);

		// ✅ Filters
		const filterButtons = container.querySelectorAll(".isotope-filters li");
		filterButtons.forEach((btn) => {
			btn.addEventListener("click", () => {
				filterButtons.forEach((b) => b.classList.remove("filter-active"));
				btn.classList.add("filter-active");

				iso.arrange({ filter: btn.getAttribute("data-filter") });

				// relayout after filtering
				relayout();
			});
		});

		// ✅ Relayout on resize
		let t;
		window.addEventListener("resize", () => {
			clearTimeout(t);
			t = setTimeout(relayout, 150);
		});
	});
});
