<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ set { :pagelistImage: false } @>
<@~ set { :pagelistImage: @{ imagePagelist | def (@{ +hero | findFirstImage | def (@{ +main }) | findFirstImage }) } } @>
