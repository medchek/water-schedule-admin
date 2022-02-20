<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>SEAAL - Program d'eau</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
    <link rel="shortcut icon" type="image/png" href="/fav/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset("/css/app.css")}}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="antialiased">
    <div id="app"></div>
    <div id="app-modal" class="absolute top-0 left-0"></div>
</body>
{{-- <script script src="{{mix(" /js/app.js")}}"> </script> --}}
@production
<script src="js/manifest.js"> </script>
<script src="js/vendor.js"> </script>
@endproduction
<script src="{{ mix('js/app.js') }}"> </script>
{{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}

</html>