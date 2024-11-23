/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

class TocComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		const main = document.querySelector('main');
		const headings = Array.from(
			main.querySelectorAll('h2[id], h3[id], h4[id]')
		);

		let open = 0;
		let lastLevel = 1;
		let html = '';

		headings.forEach((heading) => {
			const level = parseInt(heading.tagName.replace(/h/i, ''));

			if (level > lastLevel) {
				const diff = level - lastLevel;

				for (let n = 1; n <= diff; n++) {
					open++;
					html += '<ul><li>';
				}
			}

			if (level < lastLevel) {
				const diff = lastLevel - level;

				for (let n = 1; n <= diff; n++) {
					open--;
					html += '</li></ul>';
				}
			}

			if (level <= lastLevel) {
				html += '</li><li>';
			}

			html += `<a href="#${heading.id}">${heading.textContent}</a>`;
			lastLevel = level;
		});

		for (var i = 1; i <= open; i++) {
			html += '</li></ul>';
		}

		this.innerHTML = html;
	}
}

customElements.define('std-toc', TocComponent);