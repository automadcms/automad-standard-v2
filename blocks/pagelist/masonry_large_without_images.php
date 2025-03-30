<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<std-masonry class="std-pagelist-masonry std-pagelist-large">
	<@ foreach in pagelist @>
		<div class="std-pagelist-masonry__item-wrapper">
			<@ ../../components/pagelist/itemLargeNoImage.php @>
		</div>
	<@ end @>
</std-masonry>
