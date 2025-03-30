<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ if @{ tags } @>
	<div class="std-pagelist__item-tags std-tags">
		<@ foreach in tags ~@>
			<span class="std-tag">
				@{ :tag }
			</span>
		<@ end @>
	</div>
<@~ end @>
