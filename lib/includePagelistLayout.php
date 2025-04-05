<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<# 
Note that the following runtime variables have to be defined
in order to render the pagelist correctly:

	<@ set {
		:pagelistLayout: @{ selectRelatedPagelistLayout | def ('grid') },
		:dateFormat: @{ selectRelatedPagelistDateFormat | def ('MMM Y') },
		:locale: @{ locale | def (@{ :lang }) | def ('en_US') }
	} @>

#>
<@ if @{ :pagelistLayout } = 'blog' @><@ ../blocks/pagelist/blog.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'blog_without_images' @><@ ../blocks/pagelist/blog_without_images.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid' @><@ ../blocks/pagelist/grid.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid_without_images' @><@ ../blocks/pagelist/grid_without_images.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid_cards' @><@ ../blocks/pagelist/grid_cards.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid_cards_without_images' @><@ ../blocks/pagelist/grid_cards_without_images.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid_cards_square' @><@ ../blocks/pagelist/grid_cards_square.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid_large' @><@ ../blocks/pagelist/grid_large.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'grid_large_without_images' @><@ ../blocks/pagelist/grid_large_without_images.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'masonry' @><@ ../blocks/pagelist/masonry.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'masonry_cards' @><@ ../blocks/pagelist/masonry_cards.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'masonry_cards_large' @><@ ../blocks/pagelist/masonry_cards_large.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'masonry_cards_large_without_images' @><@ ../blocks/pagelist/masonry_cards_large_without_images.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'masonry_large' @><@ ../blocks/pagelist/masonry_large.php @><@ end @>	
<@ if @{ :pagelistLayout } = 'masonry_large_without_images' @><@ ../blocks/pagelist/masonry_large_without_images.php @><@ end @>	
