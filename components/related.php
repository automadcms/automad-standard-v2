<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ snippet related @>
	<@ if not @{ checkboxHideRelatedPages } @>
		<@ newPagelist {
			type: 'related',
			sort: @{ selectSortRelatedPages | def (':index asc') }
		} @>
		<@ set {
			:relatedType: @{ selectRelatedPagelistType | def ('grid') },
			:dateFormat: @{ selectRelatedPagelistDateFormat | def ('MMM Y') },
			:locale: @{ locale | def (@{ :lang }) | def ('en_US') }
		} @>
		<div class="std-layout__related">
			<@ if @{ :relatedType } = 'grid' @><@ ../blocks/pagelist/grid.php @><@ end @>	
			<@ if @{ :relatedType } = 'grid-large' @><@ ../blocks/pagelist/grid-large.php @><@ end @>	
			<@ if @{ :relatedType } = 'masonry' @><@ ../blocks/pagelist/masonry.php @><@ end @>	
			<@ if @{ :relatedType } = 'masonry-large' @><@ ../blocks/pagelist/masonry-large.php @><@ end @>	
			<@ if @{ :relatedType } = 'blog' @><@ ../blocks/pagelist/blog.php @><@ end @>	
		</div>
	<@ end @>
<@ end @>

<@ related @>
