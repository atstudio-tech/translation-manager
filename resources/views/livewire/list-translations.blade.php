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
            <div class="border-b border-slate-200 dark:border-slate-800">
                <nav class="-mb-px flex space-x-4 pl-8" aria-label="Tabs">
                    <a
                        href="?tab=all"
                        class="{{ $this->isSelectedTab('all') ? 'border-teal-500 text-teal-600 dark:border-teal-300 dark:text-teal-400' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-200 dark:text-slate-200 dark:hover:text-slate-400 dark:hover:border-slate-400' }} whitespace-nowrap flex p-4 border-b-2 font-medium text-sm"
                        wire:click.prevent="goToTab('all')"
                    >
                        All

                        <span class="{{ $this->isSelectedTab('all') ? 'bg-teal-100 text-teal-600 dark:bg-teal-700 dark:text-teal-200' : 'bg-slate-100 text-slate-900 dark:bg-slate-500 dark:text-slate-300' }} hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $allTranslations->count() }}</span>
                    </a>

                    <a
                        href="?tab=missing"
                        class="{{ $this->isSelectedTab('missing') ? 'border-teal-500 text-teal-600 dark:border-teal-300 dark:text-teal-400' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-200 dark:text-slate-200 dark:hover:text-slate-400 dark:hover:border-slate-400' }} whitespace-nowrap flex p-4 border-b-2 font-medium text-sm"
                        wire:click.prevent="goToTab('missing')"
                    >
                        Missing

                        <span class="{{ $this->isSelectedTab('missing') ? 'bg-teal-100 text-teal-600 dark:bg-teal-700 dark:text-teal-200' : 'bg-slate-100 text-slate-900 dark:bg-slate-500 dark:text-slate-300' }} hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $missingTranslations->count() }}</span>
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <ul id="missing" class="p-8">
        @foreach ($translations as $default => $translation)
            <li class="group">
                <label class="grid grid-cols-2 gap-3 items-center">
                    <span class="bg-slate-50 dark:bg-slate-600 text-slate-800 dark:text-slate-50 group-first:rounded-t-md group-last:rounded-b-md px-4 py-3 text-[13px] tracking-wider">
                        {{ $this->escapeDots($default) }}
                    </span>
                    <div>
                        <input
                            type="text"
                            class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-400 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 dark:focus:border-teal-200 focus:ring-1 focus:ring-teal-500 dark:focus:ring-teal-200 shadow-inner text-sm font-light text-slate-800 dark:text-white"
                            placeholder="{{ $translation ? null : 'To be translated...' }}"
                            value="{{ $translation }}"
                            wire:model.defer="translations.{{ $default }}"
                        />
                    </div>
                </label>
            </li>
        @endforeach

        @if (count($translations) === 0)
            <i class="font-italic text-slate-800 dark:text-slate-200">
                {{ $currentTab === 'missing' ? 'All done!' : 'No translations have been extracted.' }}
            </i>
        @endif
    </ul>

    <footer class="px-8 py-4 bg-slate-50 dark:bg-slate-600 rounded-b-md">
        <button type="submit" class="bg-teal-600 shadow-md text-white rounded uppercase text-sm px-4 py-3 tracking-widest transition duration-300 hover:bg-teal-700">
            <i class="fa-solid fa-floppy-disk text-teal-300 mr-2"></i>
            Save
        </button>
    </footer>
</form>
