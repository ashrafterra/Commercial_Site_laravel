<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Universal Networks {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Facebook div -->
    <!-- <div id="fb-root"></div> -->
    <div id="app">
    	<header>
	      <div class="bg-dark collapse" id="navbarHeader" style="">
	        <div class="container">
	          <div class="row">
	            <div class="col-sm-8 col-md-7 py-4">
	              <h4 class="text-white">About</h4>
	              <p class="text-muted">Universal provides a broad range of quality Networking products such as Fiber and copper Cables.</p>
	            </div>
	            <div class="col-sm-4 offset-md-1 py-4">
	              
                @guest
                <h4 class="text-white"><a class="text-white" href="{{ route('login') }}">{{ __('Login') }}</a></h4>
                @else
                <h4 class="text-white">{{ Auth::user()->name }}</h4>
                @endguest
	              <ul class="list-unstyled">
					@guest
					@else
            			<li><a class="text-white" href="/items/create">Add New Item</a></li>
            			<li><a class="text-white" href="/myAccount">Manage your items</a></li>
            			<li><a class="text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form></li>
					@endguest
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="navbar navbar-dark bg-dark box-shadow">
	        <div class="container d-flex justify-content-between">
	        	<a class="navbar-brand d-flex align-items-center" href="/" style=" font-weight:bolder; ">
            		<img src="/storage/logos/logo.bmp" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle>
	            <strong>Universal</strong>
	          </a>
	          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	          </button>
	        </div>
	      </div>
	    </header>

        <main role="main">
            @yield('content')
        </main>
    </div>
    
    <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId={{config('services.facebook.key')}}&autoLogAppEvents=1">
    </script> -->
</body>
</html>
