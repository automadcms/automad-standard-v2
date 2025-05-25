/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import { create } from '@/lib/utils';

const cls = {
	open: 'std-has-open-sidebar',
	backdrop: 'std-sidebar-backdrop',
	toggle: 'std-sidebar-toggle',
};

const tag = 'std-sidebar-toggle';

const toggleSidebar = () => {
	document.documentElement.classList.toggle(cls.open);
};

class SidebarToggleComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		this.classList.add(cls.toggle);

		const backdrop =
			document.querySelector(`.${cls.backdrop}`) ??
			create('div', [cls.backdrop], {}, document.body, null, true);

		this.addEventListener('click', toggleSidebar);
		backdrop.addEventListener('click', toggleSidebar);

		if (document.querySelectorAll(tag).length == 1) {
			document.body.addEventListener(
				'keydown',
				(event: KeyboardEvent) => {
					if (event.code == 'Escape') {
						document.documentElement.classList.toggle(
							cls.open,
							false
						);
					}
				}
			);
		}
	}
}

customElements.define(tag, SidebarToggleComponent);
