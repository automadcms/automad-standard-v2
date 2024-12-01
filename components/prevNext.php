<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ snippet prevNext @>
	<@ if not @{ checkboxHidePreviousAndNextPageNavigation } @>
		<@ newPagelist @>
		<div class="std-layout__prev-next">
			<div>
				<@ with prev @>
					<a href="@{ url }">@{ title }</a>	
				<@ end @>
			</div>
			<div>
				<@ with next @>
					<a href="@{ url }">@{ title }</a>	
				<@ end @>
			</div>
		</div>
	<@ end @>
<@ end @>

<@ prevNext @>
