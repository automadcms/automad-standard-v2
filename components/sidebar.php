<@ snippet treeLink ~@>
	<a href="@{ url }">@{title}</a>
<@~ end ~@>

<@ snippet treeNode ~@>
	<li class="level-@{ :level }<@ if @{ :current } @> active<@ end @>">
		<@ treeLink @>
		<@ if @{ :pagelistCount } and @{ :currentPath } ~@>
			<ul>
				<@~ tree ~@>
			</ul>
		<@~ end ~@>
	</li>	
<@~ end ~@>

<@ snippet tree ~@>
	<@ newPagelist {
		context: false,
		type: 'children'
	} ~@>

	<@~ foreach in pagelist @>
		<@~ treeNode ~@>
	<@ end ~@>
<@ end ~@>

<@ snippet sidebar ~@>
	<aside>
		<@ with '/' ~@>
			<ul>
				<li class="level-1<@ if @{ :current } @> active<@ end @>"><@ treeLink @></li>	
				<@ tree @>
			</ul>
		<@~ end @>
	</aside>
<@~ end ~@>

<@ sidebar @>
