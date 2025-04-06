<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ snippet related @>
	<@ if not @{ checkboxHideRelatedPages } @>
		<@ newPagelist {
			type: 'related',
			sort: @{ selectRelatedPagelistSort | def (':index asc') },
			limit: @{ numberRelatedPagelistMaxNumberOfPages | def (8) }
		} @>
		<@ set {
			:pagelistLayout: @{ selectRelatedPagelistLayout | def ('masonry') },
			:dateFormat: @{ selectRelatedPagelistDateFormat | def ('MMM Y') }
		} @>
		<@ if @{ :pagelistCount } @>
			<div class="std-layout__related">
				<@ ../lib/includePagelistLayout.php @>
			</div>
		<@ end @>
	<@ end @>
<@ end @>

<@ related @>
