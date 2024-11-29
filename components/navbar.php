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
<@ end @>

<@~ snippet navbarItems @>
	<@ ../lib/navbarLinksPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-layout__nav-links">
			<@ foreach in pagelist ~@>
				<a href="@{ url }" class="<@ if @{ :current } @>active<@ end @>">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
	<@ ../lib/navbarActionsPagelist.php @>
	<@ if @{ :pagelistCount } @>
		<nav class="std-layout__nav-actions">
			<@ foreach in pagelist ~@>
				<a href="@{ url }">@{ title }</a>
			<@~ end ~@>
		</nav>
	<@ end @>
<@ end @>

<@~ snippet search @>
	<@ if not @{ checkboxDisableSearch } @>
		<std-search src="/_api/public/pagelist">
			Search
			<span>
				<std-meta-key></std-meta-key>K
			</span>
		</std-search>
	<@ end @>	
<@ end @>

<@~ snippet sidebarToggle @>
	<@~ ../lib/navbarLinksPagelist.php @>
	<@~ set {
		:navCount: @{ :pagelistCount }
	} @>
	<@~ newPagelist {
		context: '/',
		type: 'children'
	} @>
	<@~ set {
		:navCount: @{ :navCount | + @{ :pagelistCount } }
	} @>
	<@~ if @{ :navCount } ~@>
		<std-sidebar-toggle></std-sidebar-toggle>
	<@~ end ~@>
<@ end @>

<@~ snippet navbar ~@>
	<div class="std-layout__brand">
		<@ brand @>	
	</div>
	<div class="std-layout__nav">
		<@ navbarItems @>
		<@ search @>
		<@ if @{ selectColorTheme | def ('switcher') } = 'switcher' @>
			<std-theme-switcher></std-theme-switcher>
		<@ end @>
		<@ sidebarToggle @>
	</div>
<@~ end ~@>

<@ navbar @>
