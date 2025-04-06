/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

type TocItem = {
	id: string;
	text: string;
	level: number;
};

const css = {
	wrapper: 'std-toc',
	ul: 'std-toc__list',
	li: 'std-toc__item',
	a: 'std-toc__link',
	active: 'std-toc__link--active',
} as const;

class TocComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		const main = document.querySelector('main');
		const headings = Array.from(
			main.querySelectorAll('h2[id], h3[id], h4[id]')
		);

		this.classList.add(css.wrapper);

		let open = 0;
		let lastLevel = 1;
		let html = '';

		const items: TocItem[] = [
			{ id: '', text: this.getAttribute('top'), level: 2 },
		];

		headings.forEach((heading) => {
			items.push({
				id: heading.id,
				text: heading.textContent,
				level: parseInt(heading.tagName.replace(/h/i, '')),
			});
		});

		items.forEach(({ id, text, level }) => {
			if (level > lastLevel) {
				const diff = level - lastLevel;

				for (let n = 1; n <= diff; n++) {
					open++;
					html += `<ul class="${css.ul}"><li class="${css.li}">`;
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

			html += `<a href="#${id}" class="${css.a}">${text}</a>`;
			lastLevel = level;
		});

		for (var i = 1; i <= open; i++) {
			html += '</li></ul>';
		}

		this.innerHTML = html;

		const observer = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				const id = entry.target.getAttribute('id');
				const link = this.querySelector(`a[href="#${id}"]`);

				try {
					if (entry.intersectionRatio > 0) {
						link.classList.add(css.active);
					} else {
						link.classList.remove(css.active);
					}
				} catch (e) {}
			});
		});

		headings.forEach((heading) => {
			observer.observe(heading);
		});
	}
}

customElements.define('std-toc', TocComponent);
