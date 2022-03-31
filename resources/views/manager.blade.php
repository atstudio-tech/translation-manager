<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Translation Manager</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Raleway:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/solid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/regular.min.css') }}" />
</head>
<body class="bg-slate-100 dark:bg-slate-800 pt-10 px-4">
<div id="app" class="max-w-6xl mx-auto"></div>

<script src="{{ asset('vendor/translation-manager/assets/js/app.js') }}"></script>
</body>
</html>
