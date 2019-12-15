<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Autodealer Uganda') }}</title>
		@include('inc.meta')
		@include('inc.links')
	</head>

	<body class="bg-light" ng-app="autodealers" ng-strict-di>
		<div ui-view></div>
		<div id="p-loading" class="text-primary bg-secondary shadow-sm align-items-center">
			<p class="strong text-white loading"><span class="fa fa-spinner fa-spin fa-2x"></span>
				<br>
				Loading...</p>
		</div>
		<script type="text/javascript">
			function showLoading() {
			document.getElementById("p-loading").style.display="block";

		}
		function hideLoading() {
			document.getElementById("p-loading").style.display="none";

		}
		document.addEventListener('load',showLoading);
		</script>
		{{-- <script type="text/javascript" data-main="myapp/main" src="myapp/libs/js/require.js"></script>     --}}
		<script src="//cdn.polyfill.io/v2/polyfill.min.js?features=default,Array.prototype.find,MutationObserver">
		</script>
		<script src="_bundles/vendors~autodealers.js"></script>
		<script src="_bundles/autodealers.js"></script>
	</body>

</html>