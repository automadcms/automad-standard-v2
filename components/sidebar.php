<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet sidebarLink ~@>
	<a href="@{ url }">@{title}</a>
<@~ end @>

<@~ snippet treeNode ~@>
	<li class="level-@{ :level }<@ if @{ :current } @> active<@ end @>">
		<@ sidebarLink @>
		<@ if @{ :pagelistCount } and @{ :currentPath } ~@>
			<ul>
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

<@~ snippet sidebar ~@>
	<aside class="std-layout__sidebar">
		<nav class="std-sidebar">
			<# Nav links #>	
			<@ if not @{ checkboxHideNavbarLinksInMobileSidebar} @>
			<ul class="std-sidebar__navbar-links">
				<@ ../lib/navbarLinksPagelist.php @>	
				<@ foreach in pagelist @>
				<li class="<@ if @{ :current } @> active<@ end @>"><@ sidebarLink @></li>	
				<@ end @>
			</ul>
			<@ end @>

			<# Tree #>
			<@ with '/' ~@>
			<ul class="std-sidebar__tree">
				<@ if not @{ hidden } @>
				<li class="level-1<@ if @{ :current } @> active<@ end @>"><@ sidebarLink @></li>	
				<@ end @>
				<@ tree @>
			</ul>
			<@~ end @>
		</nav>
	</aside>
<@~ end ~@>

<@ sidebar @>
