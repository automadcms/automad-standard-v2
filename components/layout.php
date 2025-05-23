<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet layout ~@>
	<div class="std-layout std-layout--@{ template | sanitize }">
		<# 
		Note that the order of the components
		is essential. The hero must follow the navbar 
		and main, toc, prevNext, related and footer 
		must be in that order to make optional spacing work!
		#>
		<@ navbar.php @>
		<@ hero.php @>
		<@ breadcrumbs.php @>
		<@ title.php @>
		<@ sidebar.php @>
		<@ main.php @>
		<@ toc.php @>
		<@ prevNext.php @>
		<@ related.php @>
		<@ footer.php @>
	</div>
<@~ end ~@>

<@ layout @>
