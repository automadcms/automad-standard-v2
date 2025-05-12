/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import iconArrowUp from '@/lib/icons/arrowUp.svg';
import { create } from '@/lib/utils';

type TocItem = {
	link: HTMLAnchorElement;
	observed: HTMLElement;
	level: number;
};

type List = {
	ul: HTMLUListElement;
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
		this.classList.add(css.wrapper);

		const main = document.querySelector('main');
		const top = document.querySelector<HTMLElement>('.std-brand');
		const headings = Array.from(
			main.querySelectorAll<HTMLElement>('h2[id], h3[id], h4[id]')
		);

		const items = new Map<HTMLElement, TocItem>();

		items.set(top, {
			link: create(
				'a',
				[css.a],
				{ href: '#' },
				null,
				`${this.getAttribute('top')} ${iconArrowUp}`
			),
			level: 1,
			observed: top,
		});

		headings.forEach((heading) => {
			items.set(heading, {
				link: create(
					'a',
					[css.a],
					{ href: `#${heading.id}` },
					null,
					heading.textContent
				),
				level: parseInt(heading.tagName[1]) - 1,
				observed: heading,
			});
		});

		const root = create('ul', [css.ul], {}, this);
		const stack: List[] = [{ ul: root, level: 1 }];
		const current = () => stack[stack.length - 1];

		items.forEach((item) => {
			while (stack.length > 0 && item.level < current().level) {
				stack.pop();
			}

			while (item.level > current().level) {
				const parent = current().ul;
				const li = parent.lastElementChild as HTMLLIElement;
				const ul = create('ul', [css.ul], {}, li);

				stack.push({ ul, level: current().level + 1 });
			}

			const parent = current().ul;
			const li = create('li', [css.li], {}, parent);

			li.appendChild(item.link);
		});

		let lastLink: Element = null;

		const observer = new IntersectionObserver((entries) => {
			lastLink?.classList.remove(css.active);

			entries.forEach((entry) => {
				const { link } = items.get(entry.target as HTMLElement);

				try {
					if (entry.intersectionRatio > 0) {
						link.classList.add(css.active);
					} else {
						link.classList.remove(css.active);
					}
				} catch (e) {}
			});

			if (!this.querySelector(`.${css.active}`)) {
				lastLink = null;

				items.forEach(({ observed, link }) => {
					if (observed.offsetTop < window.scrollY) {
						lastLink = link;
					}
				});

				lastLink?.classList.add(css.active);
			}
		});

		items.forEach((item) => {
			observer.observe(item.observed);
		});
	}
}

customElements.define('std-toc', TocComponent);
