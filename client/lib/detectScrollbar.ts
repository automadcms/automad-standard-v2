/*
 * Automad Standard v2
 *
 * Copyright 2025 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

const detectScrollbar = () => {
	const html = document.documentElement;

	html.classList.toggle(
		'std-has-scrollbar',
		html.clientWidth < window.innerWidth
	);
};

document.addEventListener('DOMContentLoaded', detectScrollbar);
window.addEventListener('resize', detectScrollbar);
window.addEventListener('load', detectScrollbar);
