<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nisha Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">  
    

        
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap-theme.min.css') }}">
	<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

	<link  src="{{ asset('public/css/bootstrap-datepicker.css') }}">
	<script src="{{ asset('public/js/bootstrap-datepicker.min.js') }}"></script>
  

    
    <script type="text/javascript">
  
    	$("#dob").datepicker({format: "dd/mm/yyyy"});
  
    </script>
       <script>
        $(document).ready(function() {
         });

    
    
        
        
        
        function getstatelist(countrycode){
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 $.post("{{URL('getstate')}}",{"_token":CSRF_TOKEN,"countrycode":countrycode},function(response){
           // alert(response);
            
           var len = 0;
          // $('#userTable tbody').empty(); // Empty <tbody>
           if(response['data'] != null){
              len = response['data'].length;
           }
          
           if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response['data'][i].id;
                 var state_code = response['data'][i].state_code;
                 var state_name = response['data'][i].state_name;
                

                 var tr_str = "<option value='" + state_code + "'>" + state_name + "</option>" ;
  
              }}
          // alert(len);   
                
	$("#state").show();		
	$("#state").html(tr_str);	
	});
        
        
        
        
	}
        
        
	
	function getcitylist(statecode){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("{{URL('getcity')}}",{"_token":CSRF_TOKEN,"statecode":statecode},function(data){
           // alert(data);
	$("#city").show();		
	$("#city").html(data);	});			
	}	
    
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Laravel Nisha Assignment
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                      
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('login')}}">{{ __('Login') }}</a>
                            </li>
                            
                             <li class="nav-item">
                                <a class="nav-link" href="{{URL('registeration')}}">{{ __('Register') }}</a>
                            </li>
                           
                           
                         
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
            @include('partials.alerts')
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
