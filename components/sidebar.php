<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet isActive @>
	<@~ if @{ :currentPath } @> std-active-path<@ end @>
	<@~ if @{ :current } @> std-active<@ end @>
<@~ end @>

<@~ snippet sidebarLink ~@>
	<a href="@{ url }" class="std-link">@{ title }</a>
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
						<a href="@{ url }" class="std-link">
							<@ ../lib/icons/arrowLeft.php @>	
							@{ title }
						</a>
					</li>	
				<@ end @>
			</ul>
		<@ end @>
		<@ with @{ :parent | def ('/') } ~@>
			<ul class="std-sidebar__tree">
				<@ if not @{ hidden } and @{ url } = '/' @>
					<li class="<@ isActive @>"><@ sidebarLink @></li>	
				<@ end @>
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
			<std-sidebar-toggle class="std-sidebar__close std-link">
				<@ ../lib/icons/close.php @>
			</std-sidebar-toggle>

			<# Navbar items #>	
			<@ if not @{ checkboxHideNavbarLinksInMobileSidebar} @>
				<@ ../lib/navbarActionsPagelist.php @>	
				<@ if @{ :pagelistCount } @>
					<div class="std-sidebar__navbar-buttons">
						<@ foreach in pagelist @>
							<a href="@{ url }" class="std-button">@{ title }</a>
						<@ end @>
					</div>
				<@ end @>

				<@ ../lib/navbarLinksPagelist.php @>	
				<@ if @{ :pagelistCount } @>
					<ul class="std-sidebar__navbar-links">
						<@ foreach in pagelist @>
							<li class="<@ isActive @>"><@ sidebarLink @></li>	
						<@ end @>
					</ul>
				<@ end @>
			<@ end @>

			<# Tree #>
			<@ sidebarNav @>
		</nav>
	</aside>
<@~ end ~@>

<@ sidebar @>
