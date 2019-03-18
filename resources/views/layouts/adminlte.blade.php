<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $_ENV['APP_NAME']}}</title>
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body class="skin-blue sidebar-mini" >  
  <div class="wrapper" id="idWrapper" style="opacity:0;">
    @include('layouts.header')
    @include('layouts.sidebar')
    @include('layouts.body')
    @include('layouts.footer')   
  </div>  
  @yield('script')
</body>
</html>
