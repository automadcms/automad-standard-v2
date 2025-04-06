<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<main class="std-layout__main">
	@{ +main }
	<@ set { :page: @{ ?page | def (1) } } @>
	<@ newPagelist {
		context: @{ urlMainPagelistContext },
		type: @{ selectMainPagelistSubset },
		sort: @{ selectMainPagelistSort | def (':index asc') },
		filter: @{ ?filter },
		limit: @{ numberMainPagelistMaxNumberOfPages | def (12) },
		page: @{ :page }
	} @>	
	<@ set {
		:pagelistLayout: @{ selectMainPagelistLayout | def ('masonry') },
		:dateFormat: @{ selectMainPagelistDateFormat | def ('MMM Y') }
	} @>
	<div<@ if @{ checkboxNarrowMainPagelist } @> class="am-block"<@ end @>>
		<div class="std-tags">
			<@ foreach in filters @>
				<@ if @{ :filter } != @{ ?filter } @>
					<a href="@{ url }?filter=@{ :filter }" class="std-tag">
						@{ :filter }
					</a>
				<@ else @>
					<a href="@{ url }" class="std-tag std-tag--active">
						@{ :filter }
					</a>
				<@ end @>
			<@ end @>
		</div>
		<@ ../lib/includePagelistLayout.php @>
		<@ pagelist/pagination.php @>
	</div>	
</main>
