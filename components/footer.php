<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet footerNav @>
	<@ if @{ :pagelistCount} @>
		<nav>
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
			<@~ end @>
		</nav>
	<@ end @>
<@ end @>

<@~ snippet footerNavPrimary ~@>
	<# @{ checkboxShowPageInFooterPrimary } #>
	<@ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInFooterPrimary": "/[^0]+/" }' 
	} ~@>
	<@ footerNav @>
<@~ end @>

<@~ snippet footerNavSecondary ~@>
	<# @{ checkboxShowPageInFooterSecondary } #>
	<@ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInFooterSecondary": "/[^0]+/" }' 
	} ~@>
	<@ footerNav @>
<@~ end @>

<@~ snippet footer ~@>
	<footer class="std-layout__footer-1">
		<@ footerNavPrimary @>
	</footer>
	<footer class="std-layout__footer-2">
		<@ footerNavSecondary @>
	</footer>
<@~ end ~@>

<@ footer @>
