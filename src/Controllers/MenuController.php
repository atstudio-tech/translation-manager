<?php

namespace ATStudio\TranslationManager\Controllers;

class MenuController
{
    public function index()
    {
        return collect(config('tm.locales'))
            ->map(function (string $label, string $locale) {
                return [
                    'label' => $label,
                    'locale' => $locale,
                    'source' => $this->isSource($locale),
                ];
            })
            ->values();
    }

    private function isSource(string $locale): bool
    {
        return $locale === config('app.locale');
    }
}
