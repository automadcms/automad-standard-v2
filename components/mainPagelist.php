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
		:pagelistLayout: @{ selectMainPagelistLayout | def ('grid') },
		:dateFormat: @{ selectMainPagelistDateFormat | def ('MMM Y') }
	} @>
	<div<@ if @{ checkboxNarrowMainPagelist } @> class="am-block"<@ end @>>
		<div class="std-filters">
			<@ foreach in filters @>
				<@ if @{ :filter } != @{ ?filter } @>
					<a href="@{ url }?filter=@{ :filter }" class="std-filters__link">
						<@ ../lib/icons/tag.php @>@{ :filter }
					</a>
				<@ else @>
					<a href="@{ url }" class="std-filters__link std-filters__link--active">
						<@ ../lib/icons/removeTag.php @>@{ :filter }
					</a>
				<@ end @>
			<@ end @>
		</div>
		<@ ../lib/includePagelist.php @>
		<@ pagelist/pagination.php @>
	</div>	
</main>
