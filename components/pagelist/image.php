<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<div class="std-pagelist__item-img">
	<std-img-loader
		image="<?php echo AM_BASE_URL; ?>/@{ :fileResized }"
		preload="<@ with @{ :fileResized } { width: 30 } @><?php echo AM_BASE_URL; ?>/@{ :fileResized }<@ end @>"
		width="@{ :widthResized }"
		height="@{ :heightResized }"
	></std-img-loader>
</div>

