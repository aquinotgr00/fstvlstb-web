<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport"
    content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FSTVLST</title>

  <!-- CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('dist/css/plyr.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}">

  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="{{asset('dist/js/plyr.js')}}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138417080-1"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-138417080-1');
  </script>
</head>

<body>
  @include('frontend-page.navbar')
  @yield('content')
  @include('frontend-page.modal')
</body>

</html>