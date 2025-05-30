/*
 * Automad Standard v2
 *
 * Copyright 2024 Marc Anton Dahmen, MIT license
 * https://marcdahmen.de
 */

import { create, debounce, shorten } from '@/lib/utils';

const css = {
	search: 'std-search',
	modal: {
		modal: 'std-search-modal',
		open: 'std-search-modal--open',
		backdrop: 'std-search-modal__backdrop',
		dialog: 'std-search-modal__dialog',
	},
	input: 'std-search-input',
	results: 'std-search-results',
	result: {
		result: 'std-search-result',
		selected: 'std-search-result--selected',
		title: 'std-search-result__title',
		context: 'std-search-result__context',
	},
} as const;

class SearchComponent extends HTMLElement {
	private api: string;

	private selectedIndex = 0;

	constructor() {
		super();
	}

	connectedCallback(): void {
		this.classList.add(css.search);
		this.api = this.getAttribute('src');

		this.render();
	}

	private render(): void {
		this.innerHTML = '';

		const modal = create(
			'div',
			[css.modal.modal],
			{},
			document.body,
			null,
			true
		);

		const backdrop = create('div', [css.modal.backdrop], {}, modal);
		const dialog = create('div', [css.modal.dialog], {}, modal);
		const input = create('input', [css.input], { type: 'search' }, dialog);
		const results = create('div', [css.results], {}, dialog);

		const toggleModal = (): void => {
			modal.classList.toggle(css.modal.open);

			if (modal.classList.contains(css.modal.open)) {
				input.focus();
			}
		};

		this.addEventListener('click', toggleModal);

		backdrop.addEventListener('click', toggleModal);

		window.addEventListener('keydown', (event: KeyboardEvent) => {
			if (
				modal.classList.contains(css.modal.open) &&
				event.key == 'Escape'
			) {
				toggleModal();
			}
		});

		window.addEventListener('keydown', (event: KeyboardEvent) => {
			if (event.ctrlKey || event.metaKey) {
				if (event.key === 'k') {
					event.preventDefault();

					toggleModal();
				}
			}
		});

		input.addEventListener(
			'input',
			debounce(this.getResults.bind(this, input, results))
		);

		this.initKeyHandlers(modal, results);
	}

	private async getResults(
		input: HTMLInputElement,
		container: HTMLElement
	): Promise<void> {
		const search = input.value.replace(/[^\w\s]+/g, ' ').trim();

		if (search.length < 2) {
			container.innerHTML = '';

			return;
		}

		const params = new URLSearchParams();

		params.append('search', search);
		params.append('limit', '50');
		params.append('fields', 'title, url, :searchContext');

		const query = params.toString();

		const response = await fetch(`${this.api}?${query}`);
		const { data } = await response.json();

		if (!data) {
			container.innerHTML = '';

			return;
		}

		container.innerHTML = Object.values(data).reduce(
			(html, result: any) => {
				html += `
					<a href="${result.url}" class="${css.result.result}">
						<span class="${css.result.title}">
							${result.title}
						</span>
						<span class="${css.result.context}">
							${shorten(result[':searchContext'], 350)}
						</span>
					</a>
				`;

				return html;
			},
			''
		) as string;

		this.selectedIndex = 0;

		this.updateSelected(container);
	}

	private initKeyHandlers(modal: HTMLElement, container: HTMLElement): void {
		modal.addEventListener('keydown', (event: KeyboardEvent) => {
			const count = container.children.length;

			if (!count || !modal.classList.contains(css.modal.open)) {
				return;
			}

			switch (event.key) {
				case 'ArrowUp':
					event.preventDefault();
					this.selectedIndex =
						this.selectedIndex > 0
							? this.selectedIndex - 1
							: count - 1;
					break;
				case 'ArrowDown':
					event.preventDefault();
					this.selectedIndex =
						this.selectedIndex < count - 1
							? this.selectedIndex + 1
							: 0;
					break;
				case 'Enter':
					window.location.href =
						(
							container.children[
								this.selectedIndex
							] as HTMLAnchorElement
						)?.href ?? '';
					break;
			}

			this.updateSelected(container);
		});
	}

	private updateSelected(container: HTMLElement): void {
		const selected = container.children[this.selectedIndex];

		Array.from(
			container.querySelectorAll(`.${css.result.selected}`)
		).forEach((r) => {
			r.classList.remove(css.result.selected);
		});

		selected.classList.add(css.result.selected);
	}
}

customElements.define('std-search', SearchComponent);
