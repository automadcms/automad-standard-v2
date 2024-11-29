<# 

Automad Standard v2

Copyright (c) 2024 by Marc Anton Dahmen, MIT license
https://marcdahmen.de

#>

<@~ snippet brand @>
	<@ with '/'	~@>
		<a href="@{ url }" class="std-brand">
			<@~ with @{ imageLogo } @>
				<@~ with @{ imageLogo } { width: @{ logoWidthMobile | def (50) } } @>
					<@~ set { 
						:logoMobile: @{ :fileResized }, 
						:logoMobileWidth: @{ :widthResized } 
					} @>
				<@~ end @>
				<@~ with @{ imageLogo } { width: @{ logoWidthDesktop | def (75) } } @>
					<@~ set { 
						:logoDesktop: @{ :fileResized }, 
						:logoDesktopWidth: @{ :widthResized } 
					} @>
				<@~ end ~@>
				<# 
				Multiply the desktop logo size with a 
				factor of 1.125 in order match the large 
				font size on large screens.
				#>
				<@~ with @{ imageLogo } { width: @{ logoWidthDesktop | def (75) | * 1.125 } } @>
					<@~ set { :logoDesktopLarge: @{ :fileResized }, :logoDesktopLargeWidth: @{ :widthResized } } @>
				<@~ end ~@>
				<img 
					src="@{ :logoDesktop }" 
					srcset="
						@{ :logoMobile } @{ :logoMobileWidth }w, 
						@{ :logoDesktop } @{ :logoDesktopWidth }w, 
						@{ :logoDesktopLarge } @{ :logoDesktopLargeWidth }w
					"
					sizes="
						(max-width: 768px) @{ :logoMobileWidth }px,
						<# Note that this has to match the base font size breakpoint for 1rem in base.less #>
						(max-width: 1599px) @{ :logoDesktopWidth }px, 
						@{ :logoDesktopLargeWidth }px
					"
					class="std-brand__img"
					alt="@{ :caption | def (@{ :basename }) }"
				/>	
			<@~ else ~@>
				@{ brand | def (@{ sitename }) }	
			<@~ end ~@>
		</a>
	<@~ end @>
<@ end ~@>

<div class="std-layout__brand">
	<@ brand @>	
</div>
