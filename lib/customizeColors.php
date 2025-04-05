<# 

Automad Standard v2

Copyright (c) 2025 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ set { :colorsLight: false, :colorsDark: false } @>

<# Light Mode #>
<@~ if @{ colorLightModeForegroundShade_1 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-fg-1:@{ colorLightModeForegroundShade_1 };" } @>
<@~ end @>

<@~ if @{ colorLightModeForegroundShade_2 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-fg-2:@{ colorLightModeForegroundShade_2 };" } @>
<@~ end @>

<@~ if @{ colorLightModeBackgroundShade_1 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-1:@{ colorLightModeBackgroundShade_1 };" } @>
<@~ end @>

<@~ if @{ colorLightModeBackgroundShade_2 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-2:@{ colorLightModeBackgroundShade_2 };" } @>
<@~ end @>

<@~ if @{ colorLightModeBackgroundShade_3 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-3:@{ colorLightModeBackgroundShade_3 };" } @>
<@~ end @>

<@~ if @{ colorLightModeBackgroundShade_4 } @>
	<@~ set { :colorsLight: "@{ :colorsLight }--std-bg-4:@{ colorLightModeBackgroundShade_4 };" } @>
<@~ end @>

<# Dark Mode #>
<@~ if @{ colorDarkModeForegroundShade_1 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-fg-1:@{ colorDarkModeForegroundShade_1 };" } @>
<@~ end @>

<@~ if @{ colorDarkModeForegroundShade_2 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-fg-2:@{ colorDarkModeForegroundShade_2 };" } @>
<@~ end @>

<@~ if @{ colorDarkModeBackgroundShade_1 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-1:@{ colorDarkModeBackgroundShade_1 };" } @>
<@~ end @>

<@~ if @{ colorDarkModeBackgroundShade_2 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-2:@{ colorDarkModeBackgroundShade_2 };" } @>
<@~ end @>

<@~ if @{ colorDarkModeBackgroundShade_3 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-3:@{ colorDarkModeBackgroundShade_3 };" } @>
<@~ end @>

<@~ if @{ colorDarkModeBackgroundShade_4 } @>
	<@~ set { :colorsDark: "@{ :colorsDark }--std-bg-4:@{ colorDarkModeBackgroundShade_4 };" } @>
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
