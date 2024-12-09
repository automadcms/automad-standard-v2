<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<div>
	<@ foreach in pagelist @>
		<@ ../../lib/setPagelistImage.php @>
		<@ ../../lib/setPagelistText.php @>
		<div>
			<@ with @{ :pagelistImage } { width: 400 } @>
				<img src="@{ :fileResized }" alt="@{ :caption | def (@{ :basename }) }" />
			<@ end @>
			<div>@{ title }</div>
			<div>@{ :pagelistText | 200 }</div>
		</div>
	<@ end @>
</div>
