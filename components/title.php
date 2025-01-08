<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet title @>
	<h1>@{ title }</h1>
<@~ end @>

<@ snippet tags @>
	<@ if not @{ checkboxHideTags } @>
		<@ foreach in tags @>
			<a href="?tag=@{ :tag }">@{ :tag }</a>
		<@ end @>
	<@ end @>
<@ end @>

<div class="std-layout__title">
	<@ title @>
	<@ tags @>
</div>
