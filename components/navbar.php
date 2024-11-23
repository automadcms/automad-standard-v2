<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet navbarBrand @>
	Brand
<@ end @>

<@~ snippet navbarNav @>
	<@ ../lib/navbarLinksPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-layout__nav-links">
			<@ foreach in pagelist ~@>
				<a href="@{ url }" class="<@ if @{ :current } @>active<@ end @>">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
	<@ ../lib/navbarActionsPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-layout__nav-actions">
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
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

<@~ snippet sidebarToggle @>
	<@~ ../lib/navbarLinksPagelist.php @>
	<@~ set {
		:navCount: @{ :pagelistCount }
	} @>
	<@~ newPagelist {
		context: '/',
		type: 'children'
	} @>
	<@~ set {
		:navCount: @{ :navCount | + @{ :pagelistCount } }
	} @>
	<@~ if @{ :navCount } ~@>
		<std-sidebar-toggle></std-sidebar-toggle>
	<@~ end ~@>
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
		<@ sidebarToggle @>
	</div>
<@~ end ~@>

<@ navbar @>
