<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<std-masonry class="std-pagelist-masonry">
	<@ foreach in pagelist @>
		<div>
			<@ ../../components/pagelist/item.php @>
		</div>
	<@ end @>
</std-masonry>
