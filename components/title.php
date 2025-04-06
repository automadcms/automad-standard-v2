<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet title @>
	<@ if not @{ checkboxHideTitle } @>
		<div class="std-layout__title">
			<h1>@{ title }</h1>
			<@ tags @>
		</div>
	<@ end @>
<@~ end @>

<@ snippet tags @>
	<@ if not @{ checkboxHideTags } @>
		<div class="std-tags">
			<@ foreach in tags @>
				<a href="?tag=@{ :tag }" class="std-tag">
					@{ :tag }
				</a>
			<@ end @>
		</div>
	<@ end @>
<@ end @>

<@ title @>
