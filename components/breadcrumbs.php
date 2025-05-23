<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet breadcrumbs @>
	<@ if @{ :parent } and not @{ checkboxHideBreadcrumbs } @>
		<@ newPagelist {
			type: 'breadcrumbs',
			excludeCurrent: true
		} @>
		<nav class="std-layout__breadcrumbs">
			<@ with '/' @>
				<a href="@{ url }">@{ title }</a>
			<@ end @>
			<@ foreach in pagelist @>
				<a href="@{ url }">@{ title }</a>
			<@ end @>
		</nav>	
	<@ end @>
<@~ end ~@>

<@ breadcrumbs @>
