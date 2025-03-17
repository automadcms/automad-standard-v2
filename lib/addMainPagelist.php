<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ snippet main @>
	<main class="std-layout__main">
		@{ +main }
		<@ newPagelist {
			context: @{ urlMainPagelistContext },
			type: @{ selectMainPagelistSubset },
			sort: @{ selectMainPagelistSort | def (':index asc') },
			filter: @{ ?filter }
		} @>	
		<@ set {
			:pagelistLayout: @{ selectMainPagelistLayout | def ('grid') },
			:dateFormat: @{ selectMainPagelistDateFormat | def ('MMM Y') }
		} @>
		<div<@ if !@{ checkboxStretchMainPagelist } @> class="am-block"<@ end @>>
			<div class="std-filters">
				<@ foreach in filters @>
					<@ if @{ :filter } != @{ ?filter } @>
						<a href="@{ url }?filter=@{ :filter }" class="std-filters__link">
							@{ :filter }
						</a>
					<@ else @>
						<a href="@{ url }" class="std-filters__link std-filters__link--active">
							@{ :filter }
						</a>
					<@ end @>
				<@ end @>
			</div>
			<# Note the relative path must match the location the snippet is called. #>
			<@ ../lib/includePagelist.php @>
		</div>	
	</main>
<@ end @>
