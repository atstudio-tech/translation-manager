<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Translation Manager</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Raleway:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/translation-manager/assets/fontawesome/css/solid.min.css') }}" />
</head>
<body class="bg-slate-100 pt-10 px-4">
<div class="max-w-6xl mx-auto">

    <header class="flex items-center">
        <i class="fa-solid fa-language text-3xl text-teal-500 mr-4"></i>
        <h1 class="text-slate-700 text-3xl font-raleway"><span class="font-bold">Translation</span> Manager</h1>

        <button class="ml-auto px-4 py-2 uppercase text-teal-50 inline-flex gap-3 items-center bg-teal-500 shadow-md rounded-full font-semibold text-sm tracking-wider transition duration-300 hover:bg-teal-600">
            <i class="fa-solid fa-rotate text-teal-700"></i>
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
            <header>
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select id="tabs" name="tabs" class="block w-full pl-3 pr-10 py-2 text-base border-slate-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                        <option>All</option>
                        <option selected>Missing</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-slate-200">
                        <nav class="-mb-px flex space-x-4 pl-8" aria-label="Tabs">
                            <!-- Current: "border-teal-500 text-teal-600", Default: "border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-200" -->
                            <a href="#" class="border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-200 whitespace-nowrap flex p-4 border-b-2 font-medium text-sm">
                                All

                                <!-- Current: "bg-teal-100 text-teal-600", Default: "bg-slate-100 text-slate-900" -->
                                <span class="bg-slate-100 text-slate-900 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">52</span>
                            </a>

                            <a href="#" class="border-teal-500 text-teal-600 whitespace-nowrap flex p-4 border-b-2 font-medium text-sm" aria-current="page">
                                Missing

                                <span class="bg-teal-100 text-teal-600 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">4</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </header>

            <ul class="p-8">
                <li class="group">
                    <label class="grid grid-cols-2 gap-3 items-center">
                        <span class="bg-slate-50 group-first:rounded-t-md group-last:rounded-b-md px-4 py-3 font-light text-sm">
                            Welcome, :user!
                        </span>
                        <div>
                            <input
                                type="text"
                                class="border border-slate-200 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 shadow-inner text-sm"
                                placeholder="To be translated..."
                            />
                        </div>
                    </label>
                </li>
                <li class="group">
                    <label class="grid grid-cols-2 gap-3 items-center">
                        <span class="bg-slate-50 group-first:rounded-t-md group-last:rounded-b-md px-4 py-3 font-light text-sm">
                            Last Activity
                        </span>
                        <div>
                            <input
                                type="text"
                                class="border border-slate-200 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 shadow-inner text-sm"
                                value="Dernière activité"
                            />
                        </div>
                    </label>
                </li>
                <li class="group">
                    <label class="grid grid-cols-2 gap-3 items-center">
                        <span class="bg-slate-50 group-first:rounded-t-md group-last:rounded-b-md px-4 py-3 font-light text-sm">
                            Sign Up
                        </span>
                        <div>
                            <input
                                type="text"
                                class="border border-slate-200 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 shadow-inner text-sm"
                                placeholder="To be translated..."
                            />
                        </div>
                    </label>
                </li>
                <li class="group">
                    <label class="grid grid-cols-2 gap-3 items-center">
                        <span class="bg-slate-50 group-first:rounded-t-md group-last:rounded-b-md px-4 py-3 font-light text-sm">
                            Are you sure you want to delete your computer?
                        </span>
                        <div>
                            <input
                                type="text"
                                class="border border-slate-200 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 shadow-inner text-sm"
                                placeholder="To be translated..."
                            />
                        </div>
                    </label>
                </li>
            </ul>

            <footer class="px-8 py-4 bg-slate-50 rounded-b-md">
                <button class="bg-teal-600 shadow-md text-white rounded uppercase text-sm px-4 py-3 tracking-widest transition duration-300 hover:bg-teal-700">
                    <i class="fa-solid fa-floppy-disk text-teal-300 mr-2"></i>
                    Save
                </button>
            </footer>
        </main>
    </div>

</div>
</body>
</html>
