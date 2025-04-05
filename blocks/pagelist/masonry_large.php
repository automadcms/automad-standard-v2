<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<std-masonry class="std-pagelist std-pagelist--masonry std-pagelist--large">
	<@ foreach in pagelist @>
		<div class="std-pagelist__masonry-item">
			<@ ../../components/pagelist/itemLarge.php @>
		</div>
	<@ end @>
</std-masonry>
