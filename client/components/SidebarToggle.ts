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
};

const toggleSidebar = () => {
	document.documentElement.classList.toggle(cls.open);
};

class SidebarToggleComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		const backdrop = create(
			'div',
			[cls.backdrop],
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
