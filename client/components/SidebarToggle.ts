/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import { create } from '@/lib/utils';
import iconMenu from '@/svg/menu.svg';

const css = {
	open: 'std-has-open-sidebar',
	backdrop: 'std-sidebar-backdrop',
	toggle: 'std-sidebar-toggle',
};

const toggleSidebar = () => {
	document.documentElement.classList.toggle(css.open);
};

class SidebarToggleComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		this.innerHTML = iconMenu;
		this.classList.add(css.toggle);

		const backdrop = create(
			'div',
			[css.backdrop],
			{},
			document.body,
			null,
			true
		);

		this.addEventListener('click', toggleSidebar);
		backdrop.addEventListener('click', toggleSidebar);
	}
}

customElements.define('std-sidebar-toggle', SidebarToggleComponent);
