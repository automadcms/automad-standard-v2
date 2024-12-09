<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ snippet related @>
	<@ if not @{ checkboxHideRelatedPages } @>
		<@ newPagelist {
			type: 'related'
		} @>
		<@ set { :relatedType: @{ selectRelatedPagelistType | def ('portfolio') } } @>
		<div class="std-layout__related">
			<@ if @{ :relatedType } = 'portfolio' @><@ ../blocks/pagelist/portfolio.php @><@ end @>	
			<@ if @{ :relatedType } = 'blog' @><@ ../blocks/pagelist/blog.php @><@ end @>	
		</div>
	<@ end @>
<@ end @>

<@ related @>
