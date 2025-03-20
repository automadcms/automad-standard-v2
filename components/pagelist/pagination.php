<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@ if @{ :paginationCount } > 1 @>
	<nav>
		<@ set { :page: @{ ?page | def (1) } } @>
		<@ if @{ :page } > 1 @>
			<a href="?<@ queryStringMerge { page: 1 } @>">
				<@ ../../lib/icons/chevronDoubleLeft.php @>
			</a>
			<a href="?<@ queryStringMerge { page: @{ :page | -1 } } @>">
				<@ ../../lib/icons/chevronLeft.php @>
			</a>
		<@ end @>
			<@ for @{ :page | -3 } to @{ :page | +3 } @>
				<@ if @{ :i } > 0 and @{ :i } <= @{ :paginationCount } @>
					<@ if @{ :i } = @{ :page } @>
						@{ :i }
					<@ else @>
						<a href="?<@ queryStringMerge { page: @{ :i } } @>">@{ :i }</a>
					<@ end @>
				<@ end @>
			<@ end @>
		<@ if @{ :page } < @{ :paginationCount } @>
			<a href="?<@ queryStringMerge { page: @{ :page | +1 } } @>">
				<@ ../../lib/icons/chevronRight.php @>
			</a>
			<a href="?<@ queryStringMerge { page: @{ :paginationCount } } @>">
				<@ ../../lib/icons/chevronDoubleRight.php @>
			</a>
		<@ end @>
	</nav>
<@ end @>
