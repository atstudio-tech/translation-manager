<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Translation Manager</title>

    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-slate-100 pt-10 px-4">
<div class="max-w-6xl mx-auto">
    <header class="flex items-center">
        <i class="fa-solid fa-language text-3xl text-teal-500 mr-4"></i>
        <h1 class="text-slate-700 text-3xl font-raleway"><span class="font-bold">Translation</span> Manager</h1>

        <button class="ml-auto px-4 py-2 uppercase text-teal-50 inline-flex gap-3 items-center bg-teal-500 shadow-md rounded-full font-semibold text-sm tracking-wider transition duration-300 hover:bg-teal-600 group">
            <i class="fa-solid fa-rotate transition duration-300 text-teal-700 group-hover:text-teal-800"></i>
            Scan Files
        </button>
    </header>

    <div class="flex gap-5 mt-10">
        <aside class="w-72">
            <nav class="space-y-2">
                <span class="px-3 py-2 rounded text-slate-800 flex items-center opacity-30">
                    English

                    <span class="ml-auto rounded bg-slate-200 px-2 py-0.5 text-slate-800 text-[11px] uppercase">Default</span>
                </span>
                <a class="px-3 py-2 rounded text-slate-800 flex items-center transition duration-300 bg-black/[.02]" href="#">
                    <i class="fa-solid fa-circle text-teal-600 text-[8px] mr-2"></i>

                    French
                </a>
                <a class="px-3 py-2 rounded text-slate-800 flex items-center transition duration-300 hover:bg-black/[.03]" href="#">
                    Russian
                </a>
            </nav>
        </aside>

        <main class="flex-1 bg-white rounded-md shadow">
            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>
