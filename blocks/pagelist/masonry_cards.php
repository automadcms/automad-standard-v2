<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<std-masonry class="std-pagelist-masonry std-pagelist-cards">
	<@ foreach in pagelist @>
		<div class="std-pagelist-masonry__item-wrapper">
			<@ ../../components/pagelist/item.php @>
		</div>
	<@ end @>
</std-masonry>
