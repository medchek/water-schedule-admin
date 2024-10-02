<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>SEAAL - Programme d'eau</title>
    <link rel="shortcut icon" type="image/png" href="/fav/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/js/app.ts')
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="antialiased">
    <div id="app"></div>
    <div id="app-modal" class="absolute top-0 left-0"></div>
</body>

</html>
