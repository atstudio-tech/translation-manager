<?php

namespace ATStudio\TranslationManager\Traits;

trait HasMenu
{
    public array $menu = [];

    public string $currentLocale = '';

    public function isFallback(string $locale): bool
    {
        return $locale === config('app.locale');
    }

    public function isActiveLocale(string $locale): bool
    {
        return $this->currentLocale === $locale;
    }

    protected function fetchLocales(): array
    {
        return config('tm.locales');
    }

    protected function defaultLocale(): string
    {
        return collect($this->menu)
            ->keys()
            ->first(fn(string $locale) => !$this->isFallback($locale));
    }
}
