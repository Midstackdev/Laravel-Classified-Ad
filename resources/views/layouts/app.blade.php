<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
    <div id="app">
        @include('layouts.partials._navigation')
		<div class="container">
	        <main class="py-4">
				@include('layouts.partials._alerts')
	            @yield('content')
	        </main>
        </div>
    </div>
</body>
</html>
