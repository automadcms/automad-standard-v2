<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet title @>
	<@ if not @{ checkboxHideTitle } @>
		<h1>@{ title }</h1>
		<@ tags @>
	<@ end @>
<@~ end @>

<@ snippet tags @>
	<@ if not @{ checkboxHideTags } @>
		<div class="std-filters">
			<@ foreach in tags @>
				<a href="?tag=@{ :tag }" class="std-filters__link">
					@{ :tag }
				</a>
			<@ end @>
		</div>
	<@ end @>
<@ end @>

<div class="std-layout__title">
	<@ title @>
</div>
