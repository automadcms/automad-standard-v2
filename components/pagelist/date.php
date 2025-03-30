<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ if @{ date } @>
	<div class="std-pagelist__item-date">
		@{ date | dateFormat (@{ :dateFormat }, @{ :locale }) }
	</div>
<@ end @>
