<@ snippet footerNav @>
	<@ if @{ :pagelistCount} @>
		<nav>
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
			<@~ end @>
		</nav>
	<@ end @>
<@ end @>

<@ snippet footerNavPrimary ~@>
	<# @{ checkboxShowPageInFooterPrimary } #>
	<@ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInFooterPrimary": "/[^0]+/" }' 
	} ~@>
	<@ footerNav @>
<@~ end ~@>

<@ snippet footerNavSecondary ~@>
	<# @{ checkboxShowPageInFooterSecondary } #>
	<@ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInFooterSecondary": "/[^0]+/" }' 
	} ~@>
	<@ footerNav @>
<@~ end ~@>

<@ snippet footer ~@>
	<footer>
		<@ footerNavPrimary @>
		<@ footerNavSecondary @>
	</footer>
<@~ end ~@>

<@ footer @>
