<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<# Reset variable to false in case there is no match. #>
<@ set { :pagelistImage: false } @>
<# Try to get image from variable. #>
<@ with @{ imagePagelist } ~@>
	<@ set { :pagelistImage: @{ :file } } @>
<@~ else ~@>
	<# Else try to get first image from content. #>
	<@ set { :pagelistImage: 
		@{ +hero | 
			def (@{ +main }) |
			findFirstImage 
		}
	} @>
<@~ end @>
