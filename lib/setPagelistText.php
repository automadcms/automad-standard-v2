<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<# Reset variable to false in case there is no match. #>
<@ set { :pagelistText: false } @>
<@ set { :pagelistText: 
	@{ +hero | 
		def (@{ +main }) |
		findFirstParagraph |
		stripTags
	}
} @>
