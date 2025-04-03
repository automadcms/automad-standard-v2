/*
 * Automad Standard v2
 *
 * Copyright 2025 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import { create } from '@/lib/utils';

export class ImgLoaderComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		const img = create(
			'img',
			[],
			{
				src: this.getAttribute('image'),
				width: this.getAttribute('width'),
				height: this.getAttribute('height'),
				loading: 'lazy',
			},
			this
		);

		const loaded = () => {
			this.classList.add('loaded');
			this.replaceWith(img);
		};

		this.style.backgroundImage = `url(${this.getAttribute('preload')})`;

		if (img.complete) {
			loaded();
		} else {
			img.addEventListener('load', loaded);
		}
	}
}

customElements.define('std-img-loader', ImgLoaderComponent);
