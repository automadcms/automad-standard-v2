<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet footerNav @>
	<@ if @{ :pagelistCount} @>
		<nav>
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
			<@~ end @>
		</nav>
	<@ end @>
<@ end @>

<@~ snippet footerNavPrimary ~@>
	<@ ../lib/footerPrimaryPagelist.php ~@>
	<@ footerNav @>
<@~ end @>

<@~ snippet footerNavSecondary ~@>
	<@ ../lib/footerSecondaryPagelist.php ~@>
	<@ footerNav @>
<@~ end @>

<@~ snippet footer ~@>
	<footer class="std-layout__footer">
		<nav>
			<@ footerNavPrimary @>
		</nav>
		<nav>
			<@ footerNavSecondary @>
		</nav>
	</footer>
<@~ end ~@>

<@ footer @>
