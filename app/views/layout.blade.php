<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{Config::get('edigital.nomeSistema')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/theme.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script src="/js/jquery.js"></script>
  </head>
  <body role="document">

      
    @yield('sidebar')
    <div id="wrap">
        <div class="container theme-showcase" role="main">
             @yield('content')
        </div>
        <div id="push"></div>
    </div>
    @extends('rodape')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    
  
  </body>
</html>