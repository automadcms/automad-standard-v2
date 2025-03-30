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
	<div class="std-pagelist__item-body">
		<div class="std-pagelist__item-title">
			@{ title }
		</div>
		<@ if @{ date } @>
			<div class="std-pagelist__item-date">
				@{ date | dateFormat (@{ :dateFormat }, @{ :locale }) }
			</div>
		<@ end @>
		<@ if @{ tags } @>
			<div class="std-pagelist__item-tags">
				<@ foreach in tags ~@>
					<span class="std-tag">
						@{ :tag }
					</span>
				<@ end @>
			</div>
		<@ end @>
		<@ ../../lib/setPagelistText.php @>
		<@ if @{ :pagelistText } @>
			<div class="std-pagelist__item-text">
				@{ :pagelistText }
			</div>
		<@ end @>
	</div>
</a>
