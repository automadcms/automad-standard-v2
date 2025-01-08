<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<# 
Note that the following runtime variables have to be defined
in order to render the pagelist correctly:

	<@ set {
		:relatedType: @{ selectRelatedPagelistType | def ('grid') },
		:dateFormat: @{ selectRelatedPagelistDateFormat | def ('MMM Y') },
		:locale: @{ locale | def (@{ :lang }) | def ('en_US') }
	} @>

#>
<@ if @{ :relatedType } = 'grid' @><@ ../blocks/pagelist/grid.php @><@ end @>	
<@ if @{ :relatedType } = 'grid-large' @><@ ../blocks/pagelist/grid-large.php @><@ end @>	
<@ if @{ :relatedType } = 'masonry' @><@ ../blocks/pagelist/masonry.php @><@ end @>	
<@ if @{ :relatedType } = 'masonry-large' @><@ ../blocks/pagelist/masonry-large.php @><@ end @>	
<@ if @{ :relatedType } = 'blog' @><@ ../blocks/pagelist/blog.php @><@ end @>	
