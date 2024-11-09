/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

export const create = (
	tag: string,
	classes: string[] = [],
	attributes: object = {},
	parent: HTMLElement | null = null,
	innerHTML: string = null,
	prepend: boolean = false
): any => {
	const element = document.createElement(tag);

	classes.forEach((cls) => {
		element.classList.add(cls);
	});

	for (const [key, value] of Object.entries(attributes)) {
		element.setAttribute(key, value);
	}

	if (parent) {
		if (prepend) {
			parent.prepend(element);
		} else {
			parent.appendChild(element);
		}
	}

	if (innerHTML) {
		element.innerHTML = innerHTML;
	}

	return element;
};

export const debounce = (
	callback: (...args: any[]) => void,
	timeout: number = 200
): ((...args: any[]) => void) => {
	let timer: any;

	return (...args: any[]) => {
		clearTimeout(timer);

		timer = setTimeout(() => {
			callback.apply(this, args);
		}, timeout);
	};
};

export const shorten = (str: string, max: number) => {
	return str.length < max
		? str
		: str.substr(0, str.substr(0, max).lastIndexOf(' '));
};
