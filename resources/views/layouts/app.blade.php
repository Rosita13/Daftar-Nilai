<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href={{asset('css/main.css')}}>
  <title>Daftar Nilai - @yield('title')</title>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
  <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
     @yield('styles')
</head>

<body class="sidebar-mini fixed">
  <div class="wrapper">
   @include('partials.header')
   @include('partials.sidebar')
    <div class="content-wrapper">
      @yield('content')
    </div>
  </div>
<!-- Javascripts-->
<script src={{asset('js/jquery-2.1.4.min.js')}}></script>
<script src={{asset('js/essential-plugins.js')}}></script>
<script src={{asset('js/bootstrap.min.js')}}></script>
<script src={{asset('js/plugins/pace.min.js')}}></script>
<script src={{asset('js/main.js')}}></script>
  @yield('scripts')
</body>

</html>