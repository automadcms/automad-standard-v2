<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<div class="std-pagelist-portfolio">
	<@ foreach in pagelist @>
		<@ ../../lib/setPagelistImage.php @>
		<@ ../../lib/setPagelistText.php @>
		<a href="@{ url }" class="std-pagelist-portfolio__item">
			<@ with @{ :pagelistImage } { width: 400 } @>
				<img src="@{ :fileResized }" class="std-pagelist-portfolio__img" alt="@{ :caption | def (@{ :basename }) }" />
			<@ else @>
				<div class="std-pagelist-portfolio__img-fallback">@{ title | replace ('/^(.{2}).*/', '$1') | strtoupper }</div>
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
	<@ end @>
</div>
