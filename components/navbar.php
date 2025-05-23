<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet navbarLinks @>
	<@ ../lib/navbarLinksPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-navbar__links">
			<span class="std-navbar__links-reveal">
				<@ ../lib/icons/revealNavbarLinks.php @>
			</span>
			<span class="std-navbar__links-items">
				<@ foreach in pagelist ~@>
					<a href="@{ url }" class="<@ if @{ :current } @>active<@ end @>">@{ title }</a>
				<@~ end ~@>
			</span>
		</nav>
	<@ end @>
<@ end @>

<@~ snippet navbarButtons @>
	<@ ../lib/navbarActionsPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-navbar__buttons">
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
<@ end @>

<@ snippet search ~@>
	<@~ if not @{ checkboxDisableSearch } @>
		<std-search src="/_api/public/pagelist" class="std-navbar__icon">
			<@ ../lib/icons/search.php @>
			<span class="std-navbar__tooltip">
				<std-meta-key></std-meta-key>K
			</span>
		</std-search>
	<@ end @>	
<@~ end @>

<@ snippet themeSwitcher @>
	<@~ if @{ selectColorTheme | def ('switcher') } = 'switcher' ~@>
		<std-theme-switcher class="std-navbar__icon"></std-theme-switcher>
	<@~ end @>
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
		<std-sidebar-toggle class="std-navbar__icon"></std-sidebar-toggle>
	<@~ end ~@>
<@ end @>

<@~ snippet navbar ~@>
	<@ set { 
		:navbarSticky: @{ selectNavbarSticky | def('scroll') },
		:navbarLayout: @{ selectNavbarLayout | def('horizontal') },
	} ~@>
	<std-navbar class="std-layout__navbar std-navbar std-navbar--@{ :navbarLayout }" sticky="@{ :navbarSticky }">
		<div class="std-navbar-brand">
			<@ brand.php @>
		</div>
		<div class="std-navbar-nav">
			<@ navbarLinks @>
			<@ navbarButtons @>
			<@ search @>
			<@ themeSwitcher @>
			<@ sidebarToggle @>
		</div>
	</std-navbar>
<@~ end ~@>

<@ navbar @>
