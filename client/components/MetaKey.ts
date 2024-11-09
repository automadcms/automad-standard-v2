/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

const getMetaKeyLabel = (): string => {
	if (navigator.userAgent.toLowerCase().indexOf('mac') != -1) {
		return '⌘';
	}

	return 'Ctrl';
};

class MetaKeyComponent extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback(): void {
		this.innerHTML = getMetaKeyLabel();
	}
}

customElements.define('std-meta-key', MetaKeyComponent);
