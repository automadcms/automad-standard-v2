<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet treeLink ~@>
	<a href="@{ url }">@{title}</a>
<@~ end @>

<@~ snippet treeNode ~@>
	<li class="level-@{ :level }<@ if @{ :current } @> active<@ end @>">
		<@ treeLink @>
		<@ if @{ :pagelistCount } and @{ :currentPath } ~@>
			<ul>
				<@~ tree ~@>
			</ul>
		<@~ end ~@>
	</li>	
<@~ end @>

<@~ snippet tree ~@>
	<@ newPagelist {
		context: false,
		type: 'children'
	} ~@>

	<@~ foreach in pagelist @>
		<@~ treeNode ~@>
	<@ end ~@>
<@~ end @>

<@~ snippet sidebar ~@>
	<aside class="std-layout__sidebar">
		<@ with '/' ~@>
			<ul>
				<li class="level-1<@ if @{ :current } @> active<@ end @>"><@ treeLink @></li>	
				<@ tree @>
			</ul>
		<@~ end @>
	</aside>
<@~ end ~@>

<@ sidebar @>
