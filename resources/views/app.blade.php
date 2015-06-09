<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Contabilidad Virtual</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('plugins/bootstrap/bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="{{ asset('plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/xcharts/xcharts.min.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/select2/select2.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
		<meta name="csrf-token" content="{{ csrf_token() }}" />
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="{{ route('home') }}">Contabilidad</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						@include('partials.top-menu')
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			@include('partials.lateral-menu')
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div id="ajax-content">
				<div id="message"></div>
				@include('flash::message')
				@yield('content')
			</div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="http://code.jquery.com/jquery.js"></script>-->
	<script src="{{ asset('plugins/jquery/jquery-2.1.0.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/justified-gallery/jquery.justifiedgallery.min.js') }}"></script>
	<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
	<script src="{{ asset('plugins/select2/select2.js') }}"></script>
	<!-- All functions for this theme + document.ready processing -->
	<script src="{{ asset('js/devoops.js') }}"></script>
	<script src="{{ asset('js/paginas.js') }}"></script>

	<script type="text/javascript">
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	
	    $(function () { $("[data-toggle='tooltip']").tooltip(); });
	</script>
	<script type="text/javascript">
		$('div.alert').not('div.alert-danger').delay(3000).slideUp(300);
	</script>

	@yield('scripts')
	@yield('ajax-scripts')

</body>
</html>
