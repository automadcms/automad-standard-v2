<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#><!DOCTYPE html>
<html lang="en" class="@{ template | sanitize }<@ if @{ selectColorTheme | def ('switcher') } != 'switcher' @> @{ selectColorTheme }<@ end @>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/packages/@{ theme }/dist/vendor.bundle.css" rel="stylesheet">
	<link href="/packages/@{ theme }/dist/main.bundle.css" rel="stylesheet">
	<script src="/packages/@{ theme }/dist/vendor.bundle.js" type="text/javascript"></script>
	<script src="/packages/@{ theme }/dist/main.bundle.js" type="text/javascript"></script>
</head>
<body>
	<@ if @{ ?tag } @>
		<@ layoutTag.php @>
	<@ else @>
		<@ layout.php @>
	<@ end @>
</body>
</html>
