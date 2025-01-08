<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet navbarItems @>
	<@ ../lib/navbarLinksPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-layout__navbar-links<@ if @{ checkboxShowNavbarLinksInVerticalMenu } @> std-layout__navbar-links--vertical<@ end @>">
			<@ foreach in pagelist ~@>
				<a href="@{ url }" class="<@ if @{ :current } @>active<@ end @>">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
	<@ ../lib/navbarActionsPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-layout__navbar-actions">
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
<@ end @>

<@~ snippet search @>
	<@ if not @{ checkboxDisableSearch } @>
		<std-search src="/_api/public/pagelist">
			<@ ../lib/icons/search.php @>
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
	<div class="std-layout__navbar">
		<@ navbarItems @>
		<@ search @>
		<@ if @{ selectColorTheme | def ('switcher') } = 'switcher' @>
			<std-theme-switcher></std-theme-switcher>
		<@ end @>
		<@ sidebarToggle @>
	</div>
<@~ end ~@>

<@ navbar @>
