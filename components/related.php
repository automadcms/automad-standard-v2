<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ snippet related @>
	<@ if not @{ checkboxHideRelatedPages } @>
		<@ newPagelist {
			type: 'related',
			sort: @{ selectRelatedPagelistSort | def (':index asc') }
		} @>
		<@ set {
			:relatedType: @{ selectRelatedPagelistType | def ('grid') },
			:dateFormat: @{ selectRelatedPagelistDateFormat | def ('MMM Y') },
			:locale: @{ locale | def (@{ :lang }) | def ('en_US') }
		} @>
		<div class="std-layout__related">
			<@ ../lib/includePagelist.php @>
		</div>
	<@ end @>
<@ end @>

<@ related @>
