<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet breadcrumbs @>
	<@ if @{ url } != '/' and not @{ checkboxHideBreadcrumbs } @>
		<@ newPagelist {
			type: 'breadcrumbs',
			excludeCurrent: true
		} @>
		<nav class="std-layout__breadcrumbs">
			<@ foreach in pagelist @>
				<a href="@{ url }">@{ title }</a>
			<@ end @>
		</nav>	
	<@ end @>
<@~ end ~@>

<@ breadcrumbs @>
