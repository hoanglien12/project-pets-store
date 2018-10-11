<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') </title>
	<base href="{{asset('')}}public/">
<!-- / Yoast SEO plugin. -->
<link rel="icon" href="asset/uploads/2018/01/logo-1.png" >
<link rel='stylesheet' id='s7upf-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C700%7CDosis%3A300%2C400%2C700&amp;ver=4.9.2' type='text/css' media='all' />
<link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel='stylesheet' id='font-awesome-css'  href='asset/plugin/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css' type='text/css' media='all' />
<style id='font-awesome-inline-css' type='text/css'>
[data-font="FontAwesome"]:before {font-family: 'FontAwesome' !important;content: attr(data-icon) !important;speak: none !important;font-weight: normal !important;font-variant: normal !important;text-transform: none !important;line-height: 1 !important;font-style: normal !important;-webkit-font-smoothing: antialiased !important;-moz-osx-font-smoothing: grayscale !important;}
</style>
<link rel='stylesheet' href='asset/themes/haustiere/assets/css/lib/bootstrap-theme.min.css' type='text/css' />
<link rel='stylesheet' id='s7upf-theme-css'  href='asset/css/theme.css' type='text/css' media='all' />
<link rel='stylesheet' id='s7upf-theme-style-css'  href='asset/css/custom-style.css' type='text/css' media='all' />
<link rel="stylesheet" href='asset/css/style.css' type='text/css' media='all'>
<link rel='stylesheet' id='owl-carousel-css'  href='asset/themes/haustiere/assets/css/lib/owl.carousel.min.css' type='text/css' media='all' />
<link rel="stylesheet" href="asset/plugin/js_composer/assets/css/js_composer.min.css">
<link rel="stylesheet" href="asset/css/responsive.css">

<link rel="stylesheet" href="asset/themes/haustiere/assets/css/lib/hover.min.css">
<link rel="stylesheet" href="asset/css/owl.carousel.min.css">
<link rel="stylesheet" href="asset/themes/haustiere/assets/css/lib/color.css">

<style>
	.s7upf-slider.about-store-slider {
        min-height: 375px;
    }
    .wrap-item.sv-slider.pagi-nav-style.owl-carousel.owl-theme {
        margin: 30px auto;
    }
</style>
</head>
<body>
	<div class="wap">
		@include('client.header')
		<div id="main-content" class="visual-template">
			<div class="container">
                <div class="row">
                    <div class="content-wrap col-md-12 col-sm-12 col-xs-12">
                        <article id="post-868" class="post-868 page type-page status-publish hentry">
                            <div class="entry-content">
								@yield('content')
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		@include('client.footer')
	</div>
</body>
