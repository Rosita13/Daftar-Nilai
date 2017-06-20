<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href={{asset('css/main.css')}}>
  <title>@yield('title') - Sistem Informasi Nilai Siswa</title>
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
<script type="text/javascript" src={{asset('js/plugins/bootstrap-notify.min.js')}}></script>
<script type="text/javascript" src={{asset('js/plugins/sweetalert.min.js')}}></script>
 <script type="text/javascript" src={{asset('js/plugins/select2.min.js')}}></script>
<script>
    $(document).ready(function(){
        var pathname = window.location.pathname;
        console.log('url path =>',pathname);
        switch (pathname) {
            case '/':
                $('#nav-list-class').removeClass('active');
                $('#nav-list-guru').removeClass('active');
                $('#nav-list-mapel').removeClass('active');
                $('#nav-list-nilai').removeClass('active');
                $('#nav-list-siswa').removeClass('active');
                $('#nav-list-user').removeClass('active');
                $('#nav-dashboard').addClass('active');
                break; 
            case '/users':
            case '/users/create':
                $('#nav-list-class').removeClass('active');
                $('#nav-list-guru').removeClass('active');
                $('#nav-list-mapel').removeClass('active');
                $('#nav-list-nilai').removeClass('active');
                $('#nav-list-siswa').removeClass('active');
                $('#nav-dashboard').removeClass('active');
                $('#nav-list-user').addClass('active');
                break; 
            case '/teachers':
            case '/teachers/create':
                $('#nav-list-class').removeClass('active');
                $('#nav-list-mapel').removeClass('active');
                $('#nav-list-nilai').removeClass('active');
                $('#nav-list-siswa').removeClass('active');
                $('#nav-list-user').removeClass('active');
                $('#nav-dashboard').removeClass('active');
                $('#nav-list-guru').addClass('active');
                break;  
            case '/students':
            case '/students/create':
                $('#nav-list-class').removeClass('active');
                $('#nav-list-guru').removeClass('active');
                $('#nav-list-mapel').removeClass('active');
                $('#nav-list-nilai').removeClass('active');
                $('#nav-list-user').removeClass('active');
                $('#nav-dashboard').removeClass('active');
                $('#nav-list-siswa').addClass('active');
                break;  
            case '/values':
            case '/values/create':
                $('#nav-list-class').removeClass('active');
                $('#nav-list-guru').removeClass('active');
                $('#nav-list-mapel').removeClass('active');
                $('#nav-list-siswa').removeClass('active');
                $('#nav-list-user').removeClass('active');
                $('#nav-dashboard').removeClass('active');
                $('#nav-list-nilai').addClass('active');
                break;  
            case '/classes':
            case '/classes/create':
                $('#nav-list-siswa').removeClass('active');
                $('#nav-list-guru').removeClass('active');
                $('#nav-list-mapel').removeClass('active');
                $('#nav-list-nilai').removeClass('active');
                $('#nav-list-user').removeClass('active');
                $('#nav-dashboard').removeClass('active');
                $('#nav-list-class').addClass('active');
                break;
            case '/subjects':
            case '/subjects/create':
                $('#nav-list-class').removeClass('active');
                $('#nav-list-guru').removeClass('active');
                $('#nav-list-siswa').removeClass('active');
                $('#nav-list-nilai').removeClass('active');
                $('#nav-list-user').removeClass('active');
                $('#nav-dashboard').removeClass('active');
                $('#nav-list-mapel').addClass('active');
                break;  
            default: 
                text = "Looking forward to the Weekend";
        }
    });
</script>
  @yield('scripts')
</body>

</html>