<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet navbarBrand @>
	Brand
<@ end @>

<@~ snippet navbarNav @>
	<# @{ checkboxShowPageInNavbar } #>
	<@ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInNavbar": "/[^0]+/" }' 
	} @>
	<@ if @{ :pagelistCount } @>
		<nav>
		<@ foreach in pagelist ~@>
				<a href="@{ url }" class="<@ if @{ :current } @>active<@ end @>">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
<@ end @>

<@~ snippet navbarSearch @>
	<@ if not @{ checkboxDisableSearch } @>
		<std-search src="/_api/public/pagelist">
			Search
			<span>
				<std-meta-key></std-meta-key>K
			</span>
		</std-search>
	<@ end @>	
<@ end @>

<@~ snippet navbar ~@>
	<div class="std-layout__brand">
		<@ navbarBrand @>	
	</div>
	<div class="std-layout__nav">
		<@ navbarNav @>
		<@ navbarSearch @>
		<@ if @{ selectColorTheme | def ('switcher') } = 'switcher' @>
			<std-theme-switcher></std-theme-switcher>
		<@ end @>
	</div>
<@~ end ~@>

<@ navbar @>
