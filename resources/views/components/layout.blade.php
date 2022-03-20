<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Translation Manager</title>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Raleway:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/solid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/regular.min.css') }}" />
    @livewireStyles
</head>
<body class="bg-slate-100 dark:bg-slate-800 pt-10 px-4">
<div class="max-w-6xl mx-auto">
    <header class="flex items-center">
        <i class="fa-solid fa-language text-3xl text-teal-500 mr-4"></i>
        <h1 class="text-slate-700 dark:text-slate-300 text-3xl font-raleway"><span class="font-bold">Translation</span> Manager</h1>

        <livewire:tm::scan-action />
    </header>

    {{ $slot }}
</div>

@livewireScripts
</body>
</html>
