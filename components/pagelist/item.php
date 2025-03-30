<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<a href="@{ url }" class="std-pagelist__item">
	<@ ../../lib/setPagelistImage.php @>
	<@ with @{ :pagelistImage } { width: 400 } @>
		<img src="@{ :fileResized }" class="std-pagelist__img" alt="@{ :caption | def (@{ :basename }) }" />
	<@ end @>
	<div class="std-pagelist__item-body">
		<@ title.php @>
		<@ date.php @>
		<@ tags.php @>
	</div>
</a>
