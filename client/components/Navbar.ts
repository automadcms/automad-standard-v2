/*
 * Automad Standard v2
 *
 * Copyright 2025 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import { debounce } from '@/lib/utils';

type NavbarType = 'scroll' | 'always' | 'disabled';

const minScroll = 100;
const debounceTime = 10;

const cls = {
	sticky: 'std-navbar--sticky',
	hidden: 'std-navbar--hidden',
	scrolled: 'std-navbar--scrolled',
	htmlSticky: 'std-has-sticky-navbar',
} as const;

class NavbarComponent extends HTMLElement {
	get sticky(): NavbarType {
		return (this.getAttribute('sticky') as NavbarType) || 'scroll';
	}

	constructor() {
		super();
	}

	connectedCallback(): void {
		setTimeout(this.init.bind(this), 0);
	}

	private init(): void {
		if (['disabled'].includes(this.sticky)) {
			return;
		}

		document.documentElement.style.setProperty(
			'--std-navbar-height',
			`${Math.round(this.getBoundingClientRect().height)}px`
		);

		window.addEventListener(
			'scroll',
			debounce(() => {
				this.classList.toggle(cls.scrolled, window.scrollY > minScroll);
			}, debounceTime)
		);

		if (this.sticky == 'always') {
			this.classList.add(cls.sticky);
			document.documentElement.classList.add(cls.htmlSticky);

			return;
		}

		let lastScrollY = 0;

		window.addEventListener(
			'scroll',
			debounce(() => {
				const { scrollY } = window;
				const up = lastScrollY > scrollY;

				if (lastScrollY === scrollY) {
					return;
				}

				if (up && scrollY > minScroll) {
					this.classList.add(cls.sticky);
				} else {
					setTimeout(() => {
						this.classList.remove(cls.sticky);
					}, 200);
				}

				this.classList.toggle(cls.hidden, !up && scrollY > minScroll);

				document.documentElement.classList.toggle(
					cls.htmlSticky,
					up && scrollY > minScroll
				);

				lastScrollY = scrollY;
			}, debounceTime)
		);
	}
}

customElements.define('std-navbar', NavbarComponent);
