/*
 * Automad Standard v2
 *
 * Copyright 2025 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import { debounce } from '@/lib/utils';

const cls = {
	item: 'std-pagelist__item',
	applied: 'std-pagelist-masonry--applied',
} as const;

const calcItemRowSpan = (
	item: HTMLElement,
	rowHeight: number,
	rowGap: number
): number => {
	const content = item.querySelector(`.${cls.item}`);
	const paddingTop = parseInt(
		window.getComputedStyle(item).getPropertyValue('padding-top')
	);
	const paddingBottom = parseInt(
		window.getComputedStyle(item).getPropertyValue('padding-bottom')
	);

	return Math.ceil(
		(content.getBoundingClientRect().height +
			rowGap +
			paddingTop +
			paddingBottom) /
			(rowHeight + rowGap)
	);
};

class MasonryComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		const debounced = debounce(this.layout.bind(this), 100);

		setTimeout(() => {
			this.querySelectorAll<HTMLImageElement>('img').forEach((img) => {
				img.addEventListener('load', debounced);
			});

			this.layout();
		}, 0);

		window.addEventListener('resize', debounced);
		window.addEventListener('load', debounced);
		window.addEventListener('orientationchange', debounced);
	}

	layout(): void {
		const items = Array.from(this.children);

		if (!items) {
			return;
		}

		const rowHeight = parseInt(
			window.getComputedStyle(this).getPropertyValue('grid-auto-rows')
		);

		const rowGap = parseInt(
			window.getComputedStyle(this).getPropertyValue('row-gap')
		);

		this.classList.remove(cls.applied);

		items.forEach((item: HTMLElement) => {
			item.style.gridRowStart = '';
			item.style.gridColumnStart = '';
			item.style.gridRowEnd =
				'span ' + calcItemRowSpan(item, rowHeight, rowGap);
		});

		this.classList.add(cls.applied);
	}
}

customElements.define('std-masonry', MasonryComponent);
