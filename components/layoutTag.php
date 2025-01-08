<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet layoutTag ~@>
	<div class="std-layout std-layout--tag">
		<div class="std-layout__nav">
			<a href="@{ url }">
				<@ ../lib/icons/close.php @>
			</a>
		</div>
		<div class="std-layout__title">
			<h1># @{ ?tag }</h1>
			<@ foreach in filters @>
				<@ if @{ :filter } != @{ ?tag } @>
					<a href="?tag=@{ :filter }">
						@{ :filter }
					</a>
				<@ end @>
			<@ end @>
		</div>
		<div class="std-layout__main">
			<@ newPagelist {
				filter: @{ ?tag },
				sort: @{ selectTagPagelistSort | def (':index asc') }
			} @>	
			<@ set {
				:relatedType: @{ selectTagPagelistType | def ('grid') },
				:dateFormat: @{ selectTagPagelistDateFormat | def ('MMM Y') },
				:locale: @{ locale | def (@{ :lang }) | def ('en_US') }
			} @>
			<@ ../lib/includePagelist.php @>
		</div>
	</div>
<@~ end ~@>

<@ layoutTag @>
