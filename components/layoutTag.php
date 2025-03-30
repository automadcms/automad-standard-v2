<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet layoutTag ~@>
	<div class="std-layout std-layout--tag">
		<div class="std-layout__navbar">
			<@ if @{ selectColorTheme | def ('switcher') } = 'switcher' @>
				<std-theme-switcher></std-theme-switcher>
			<@ end @>
			<a href="@{ url }">
				<@ ../lib/icons/close.php @>
			</a>
		</div>
		<div class="std-layout__title">
			<h1>@{ ?tag }</h1>
			<div class="std-filters">
				<@ foreach in filters @>
					<@ if @{ :filter } != @{ ?tag } @>
						<a href="?tag=@{ :filter }" class="std-filters__link">
							<@ ../lib/icons/tag.php @>@{ :filter }
						</a>
					<@ end @>
				<@ end @>
			</div>
		</div>
		<div class="std-layout__main">
			<@ set { :page: @{ ?page | def (1) } } @>
			<@ newPagelist {
				filter: @{ ?tag },
				sort: @{ selectTagPagelistSort | def (':index asc') },
				limit: @{ numberTagPagelistMaxNumberOfPages | def (12) },
				page: @{ :page }
			} @>	
			<@ set {
				:pagelistLayout: @{ selectTagPagelistLayout | def ('grid') },
				:dateFormat: @{ selectTagPagelistDateFormat | def ('MMM Y') }
			} @>
			<@ ../lib/includePagelistLayout.php @>
			<@ pagelist/pagination.php @>
		</div>
	</div>
<@~ end ~@>

<@ layoutTag @>
