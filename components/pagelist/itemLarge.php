<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<a href="@{ url }" class="std-pagelist__item">
	<@ ../../lib/setPagelistImage.php @>
	<@ with @{ :pagelistImage } { width: 900 } @>
		<img src="@{ :fileResized }" class="std-pagelist__img" alt="@{ :caption | def (@{ :basename }) }" />
	<@ end @>
	<div>@{ title }</div>
	<div>
		<@ foreach in tags ~@>
			<@ if @{ :i } > 1 @>,<@ end @>
			@{ :tag }
		<@~ end @>
		<@ if @{ tags } @>
			<br>
		<@ end @>
		@{ date | dateFormat (@{ :dateFormat }, @{ :locale }) }
	</div>
	<div>
		<@ ../../lib/setPagelistText.php @>
		@{ :pagelistText }
	</div>
</a>
