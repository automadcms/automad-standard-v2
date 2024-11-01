<!DOCTYPE html>
<html lang="en" class="@{ template | sanitize }">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>XXX</title>
	<@ with @{ imageFavicon } ~@>
		<link href="@{ :file }" rel="shortcut icon" type="image/x-icon" />
	<@ end ~@>
	<@ with @{ imageAppleTouchIcon } ~@>
		<link href="@{ :file }" rel="apple-touch-icon" />
	<@~ end @>
	<link href="/packages/@{ theme }/dist/main.bundle.css" rel="stylesheet">
	<script src="/packages/@{ theme }/dist/main.bundle.js" type="text/javascript"></script>
</head>
<body>
	<@ layout.php @>
</body>
</html>
