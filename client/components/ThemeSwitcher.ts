/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import iconLight from '@/svg/light.svg';
import iconDark from '@/svg/dark.svg';

type Theme = 'light' | 'dark';

const localStorageKey = 'std-theme';

const getTheme = (): Theme => {
	const localScheme = localStorage.getItem(localStorageKey);

	if (localScheme) {
		return localScheme as Theme;
	}

	if (
		window.matchMedia &&
		window.matchMedia('(prefers-color-scheme: dark)').matches
	) {
		return 'dark';
	}

	return 'light';
};

class ThemeSwitcherComponent extends HTMLElement {
	constructor() {
		super();
	}

	private toggleTheme(): void {
		const currentTheme = getTheme();
		const newTheme = currentTheme === 'light' ? 'dark' : 'light';

		localStorage.setItem(localStorageKey, newTheme);

		this.applyTheme(newTheme);
	}

	private applyTheme(theme: Theme): void {
		document.documentElement.classList.remove('light', 'dark');
		document.documentElement.classList.add(theme);

		this.innerHTML = theme === 'light' ? iconLight : iconDark;
	}

	connectedCallback(): void {
		this.applyTheme(getTheme());
		this.addEventListener('click', this.toggleTheme.bind(this));
	}
}

customElements.define('std-theme-switcher', ThemeSwitcherComponent);
