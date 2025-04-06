<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ set { :colorsLight: false, :colorsDark: false } @>

<# Light Mode #>
<@~ if @{ colorLightFg1 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-fg-1:@{ colorLightFg1 };" } @>
<@~ end @>

<@~ if @{ colorLightFg2 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-fg-2:@{ colorLightFg2 };" } @>
<@~ end @>

<@~ if @{ colorLightBg1 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-1:@{ colorLightBg1 };" } @>
<@~ end @>

<@~ if @{ colorLightBg2 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-2:@{ colorLightBg2 };" } @>
<@~ end @>

<@~ if @{ colorLightBg3 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-3:@{ colorLightBg3 };" } @>
<@~ end @>

<@~ if @{ colorLightBg4 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-4:@{ colorLightBg4 };" } @>
<@~ end @>

<# Dark Mode #>
<@~ if @{ colorDarkFg1 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-fg-1:@{ colorDarkFg1 };" } @>
<@~ end @>

<@~ if @{ colorDarkFg2 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-fg-2:@{ colorDarkFg2 };" } @>
<@~ end @>

<@~ if @{ colorDarkBg1 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-1:@{ colorDarkBg1 };" } @>
<@~ end @>

<@~ if @{ colorDarkBg2 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-2:@{ colorDarkBg2 };" } @>
<@~ end @>

<@~ if @{ colorDarkBg3 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-3:@{ colorDarkBg3 };" } @>
<@~ end @>

<@~ if @{ colorDarkBg4 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-4:@{ colorDarkBg4 };" } @>
<@~ end @>

<@~ if @{ :colorsLight } or @{ :colorsDark } ~@>
	<style>
		<@~ if @{ :colorsLight } ~@>
			html:not(.dark){@{ :colorsLight }}
		<@~ end ~@>
		<@~ if @{ :colorsDark } ~@>
			.dark{@{ :colorsDark }}
		<@~ end ~@>
	</style>	
<@~ end @>
