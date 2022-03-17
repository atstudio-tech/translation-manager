<form wire:submit.prevent="save">
    @csrf
    @method('PUT')

    <x-tm::notification :feedback="$feedback" />

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
        <pre>{{ print_r($translations) }}</pre>

        @foreach ($translations as $default => $translation)
            <li class="group">
                <label class="grid grid-cols-2 gap-3 items-center">
                    <span class="bg-slate-50 group-first:rounded-t-md group-last:rounded-b-md px-4 py-3 text-[13px] tracking-wider">
                        {{ $default }}
                    </span>
                    <div>
                        <input
                            type="text"
                            name="translations[{{ $default }}]"
                            class="border border-slate-200 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 shadow-inner text-sm font-light"
                            placeholder="{{ $translation ? null : 'To be translated...' }}"
                            value="{{ $translation }}"
                            wire:model.defer="translations.{{ $default }}"
                        />
                    </div>
                </label>
            </li>
        @endforeach
    </ul>

    <footer class="px-8 py-4 bg-slate-50 rounded-b-md">
        <button type="submit" class="bg-teal-600 shadow-md text-white rounded uppercase text-sm px-4 py-3 tracking-widest transition duration-300 hover:bg-teal-700">
            <i class="fa-solid fa-floppy-disk text-teal-300 mr-2"></i>
            Save
        </button>
    </footer>
</form>
