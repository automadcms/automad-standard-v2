<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet isActive @>
	<@~ if @{ :currentPath } @>std-active-path<@ end @>
	<@~ if @{ :current } @> std-active<@ end @>
<@~ end @>

<@~ snippet sidebarLink ~@>
	<a href="@{ url }">@{title}</a>
<@~ end @>

<@~ snippet treeNode ~@>
	<li class="<@ isActive @>">
		<@ sidebarLink @>
		<@ if @{ :pagelistCount } and @{ :currentPath } ~@>
			<ul class="std-sidebar__tree">
				<@~ tree ~@>
			</ul>
		<@~ end ~@>
	</li>	
<@~ end @>

<@~ snippet tree ~@>
	<@ newPagelist {
		context: false,
		type: 'children'
	} ~@>

	<@~ foreach in pagelist @>
		<@~ treeNode ~@>
	<@ end ~@>
<@~ end @>

<@~ snippet sidebarNav @>
	<@ if @{ checkboxCollapseSidebarNavigation } @>
		<@ if @{ :parent } @>
			<@ newPagelist {
				type: 'breadcrumbs',
				excludeCurrent: true
			} ~@>
			<ul class="std-sidebar__breadcrumbs">
				<@ foreach in pagelist @>
					<li class="<@ isActive @>">
						<@ ../lib/icons/arrowLeft.php @>	
						<a href="@{ url }">@{title}</a>
					</li>	
				<@ end @>
			</ul>
		<@ end @>
		<@ with @{ :parent } ~@>
			<ul class="std-sidebar__tree">
				<@~ tree ~@>
			</ul>
		<@~ end @>
	<@ else @>
		<@ with '/' ~@>
		<ul class="std-sidebar__tree">
				<@ if not @{ hidden } @>
					<li class="<@ isActive @>"><@ sidebarLink @></li>	
				<@ end @>
				<@~ tree ~@>
			</ul>
		<@~ end @>
	<@ end @>
<@ end @>

<@~ snippet sidebar ~@>
	<aside class="std-layout__sidebar">
		<nav class="std-sidebar">
			<# Navbar links #>	
			<@ if not @{ checkboxHideNavbarLinksInMobileSidebar} @>
				<ul class="std-sidebar__navbar-links">
					<@ ../lib/navbarLinksPagelist.php @>	
					<@ foreach in pagelist @>
						<li class="<@ isActive @>"><@ sidebarLink @></li>	
					<@ end @>
				</ul>
			<@ end @>

			<# Tree #>
			<@ sidebarNav @>
		</nav>
	</aside>
<@~ end ~@>

<@ sidebar @>
