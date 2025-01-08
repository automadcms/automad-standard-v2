<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet layout ~@>
	<div class="std-layout std-layout--@{ template | sanitize }">
		<@ brand.php @>
		<@ navbar.php @>
		<@ hero.php @>
		<@ sidebar.php @>
		<@ breadcrumbs.php @>
		<@ title.php @>
		<@ main.php @>
		<@ prevNext.php @>
		<@ related.php @>
		<@ toc.php @>
		<@ footer.php @>
	</div>
<@~ end ~@>

<@ layout @>
