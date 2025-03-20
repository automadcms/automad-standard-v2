<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ ../../lib/setPagelistImage.php @>
<@ ../../lib/setPagelistText.php @>
<a href="@{ url }" class="std-pagelist__item">
	<@ with @{ :pagelistImage } { width: 400 } @>
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
</a>
