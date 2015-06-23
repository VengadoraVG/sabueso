<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/bower_resources/bootstrap/dist/css/bootstrap.min.css" type="text/css" media="screen" />
    <script type="text/javascript" src="/bower_resources/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_resources/bootstrap/dist/js/bootstrap.min.js"> </script>

   @yield('script')
  </head>
  
  <body>

    @if(Auth::check())
      <div class="row">
        <a href="logout">
          <button type="button" class="btn btn-danger col-sm-offset-10"> Log Out </button>
        </a><br />
      </div>
    @endif

    <div class="container">
      @yield('content')
    </div>

  </body>
</html>
