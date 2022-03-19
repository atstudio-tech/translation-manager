<aside class="w-72">
    <nav class="space-y-2">
        @foreach ($menu as $locale => $lang)
            @if ($this->isFallback($locale))
                <span class="px-3 py-2 rounded text-slate-800 dark:text-slate-50 flex items-center opacity-30">
                    {{ $lang }}

                    <span class="ml-auto rounded bg-slate-200 px-2 py-0.5 text-slate-800 text-[11px] uppercase">Fallback</span>
                </span>

                @continue
            @endif

            <a
                class="px-3 py-2 rounded text-slate-800 dark:text-slate-300 flex items-center transition duration-300 {{ $this->isActiveLocale($locale) ? 'bg-black/[.02] dark:bg-white/[.03]' : 'hover:bg-black/[.03] dark:hover:bg-white/[.05]' }}"
                href="#"
                wire:click.prevent="changeLocale('{{ $locale }}')"
            >
                @if ($this->isActiveLocale($locale))
                    <i class="fa-solid fa-circle text-teal-600 text-[8px] mr-2"></i>
                @endif

                {{ $lang }}
            </a>
        @endforeach
    </nav>
</aside>
