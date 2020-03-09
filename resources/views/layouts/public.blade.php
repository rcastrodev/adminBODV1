<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=10.0, user-scalable=yes">

	<title>@yield('title')</title>

	<link rel="stylesheet" id="elementor-frontend-css" href="{{ asset('css/public/frontend.css') }}" type="text/css" media="all">
	<link rel="icon" href="{{ asset('img/public/cropped-fav-icon-grand-32x32.png') }}" sizes="32x32">
	<link rel="icon" href="{{ asset('img/public/cropped-fav-icon-grand-192x192.png') }}" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('img/public/cropped-fav-icon-grand-180x180.png') }}">
	@yield('head')
</head>

<body data-rsssl="1" class="page-template-default page page-id-1677 wp-custom-logo theme-customify woocommerce-js content main-layout-content site-full-width menu_sidebar_dropdown woocommerce later-wc-version elementor-default elementor-kit-3414 elementor-page elementor-page-1677 not-touch-screen" data-elementor-device-mode="desktop">

	<div id="page" class="site box-shadow">
		<a class="skip-link screen-reader-text" href="#site-content">Ir al contenido</a>
		<a class="close is-size-medium  close-panel close-sidebar-panel" href="#">
			<span class="hamburger hamburger--squeeze is-active">
				<span class="hamburger-box">
					<span class="hamburger-inner">
						<span class="screen-reader-text">Menú</span>
					</span>
				</span>
			</span>
			<span class="screen-reader-text">Cerrar</span>
		</a>

		@include('partials.public.header')

		@yield('title-h1')

		<div id="site-content" class="content-full-stretched site-content">
			@yield('content')
		</div>
		<!-- #content -->

		@include('partials.public.footer')		

	</div>
	<!-- #page -->

	@yield('foot')
</body>
</html>