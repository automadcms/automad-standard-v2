<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ set { :locale: @{ locale | def (@{ :lang }) | def ('en_US') } } @>

<@~ if @{ selectColorTheme | def ('switcher') } != 'switcher' @> 
	<@~ set { :colorTheme: ' @{ selectColorTheme }' } @>
<@~ end @>

<@~ if @{ checkboxCompactLayout } @>
	<@~ set { :compact: ' compact' } @>
<@~ end @>

<@~ if @{ checkboxDisablePagelistAnimations } @>
	<@~ set { :noPagelistAnimations: ' no-pagelist-animations' } @>
<@~ end ~@>

<!DOCTYPE html>
<html lang="en" class="@{ template | sanitize }@{ :colorTheme }@{ :compact }@{ :noPagelistAnimations }">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/packages/@{ theme }/dist/vendor.bundle.css" rel="stylesheet">
	<link href="/packages/@{ theme }/dist/main.bundle.css" rel="stylesheet">
	<script src="/packages/@{ theme }/dist/vendor.bundle.js" type="text/javascript"></script>
	<script src="/packages/@{ theme }/dist/main.bundle.js" type="text/javascript"></script>
	<@~ ../lib/customizeColors.php ~@>
</head>
<body>
	<@ if @{ ?tag } @>
		<@ layoutTag.php @>
	<@ else @>
		<@ layout.php @>
	<@ end @>
</body>
</html>
