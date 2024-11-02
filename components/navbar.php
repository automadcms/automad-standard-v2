<@ snippet navbarBrand @>
	Brand
<@ end @>

<@ snippet navbarNav @>
	<# @{ checkboxShowPageInNavbar } #>
	<@ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInNavbar": "/[^0]+/" }' 
	} @>
	<@ if @{ :pagelistCount } @>
		<nav>
		<@ foreach in pagelist ~@>
				<a href="@{ url }" class="<@ if @{ :current } @>active<@ end @>">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
<@ end @>

<@ snippet navbarSearch @>
	<@ if not @{ checkboxDisableSearch } @>
		<std-search src="/_api/public/pagelist">
			Search
			<span>
				<std-meta-key></std-meta-key>K
			</span>
		</std-search>
	<@ end @>	
<@ end @>

<@ snippet navbar ~@>
	<@ navbarBrand @>	
	<@ navbarNav @>
	<@ navbarSearch @>
<@~ end ~@>

<@ navbar @>
