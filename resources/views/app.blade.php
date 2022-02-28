<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>SEAAL - Programme d'eau</title>
    <link rel="shortcut icon" type="image/png" href="/fav/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{mix('/css/app.css')}}" rel="stylesheet">
    {{--
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="antialiased">
    <div id="app"></div>
    <div id="app-modal" class="absolute top-0 left-0"></div>
</body>
@production
<script src="/js/vendor.js"></script>
<script src="/js/manifest.js"></script>
@endproduction
<script src="{{mix('js/app.js')}}"> </script>

</html>