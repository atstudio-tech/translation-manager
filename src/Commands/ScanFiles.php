<?php

namespace ATStudio\TranslationManager\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class ScanFiles extends Command
{
    protected $signature = 'tm:scan';

    protected $description = 'Scan files for translation strings.';

    public function handle()
    {
        $locales = $this->availableLocales();
        $extracted = $this->extractTranslations();

        foreach ($locales as $locale) {
            $contents = $this->existingTranslations($locale);
            $this->storeTranslations($extracted, $locale, $contents);
        }

        $this->info('The scan has completed.');
    }

    /**
     * Get a list of available locales.
     */
    protected function availableLocales(): array
    {
        $locales = config('tm.locales');
        $key = array_search(config('app.fallback_locale'), $locales);

        if ($key !== false) {
            unset($locales[$key]);
        }

        return $locales;
    }

    /**
     * Extract translation strings from scanned files.
     */
    protected function extractTranslations(): Collection
    {
        $foldersToScan = config('tm.folders');
        $files = $this->files($foldersToScan);
        $strings = collect([]);

        foreach ($files as $file) {
            $this->line("Scanning {$file->getPathname()}...");
            preg_match_all('/(?:__|trans(?:_choice)?|@(?:lang|choice))\([\'"](.+)[\'"][),]/', $file->getContents(), $matches);

            if ($matches[1]) {
                $strings = $strings->merge($matches[1]);
            }
        }

        return $strings;
    }

    /**
     * Get a list of all files that we need to scan for translation strings.
     *
     * @return array<SplFileInfo>
     */
    protected function files(array $foldersToScan): array
    {
        $files = [];

        foreach ($foldersToScan as $folder) {
            $files = array_merge($files, File::allFiles($folder));
        }

        return $files;
    }

    /**
     * Retrieve existing translation strings for a specific locale.
     *
     * @return array<string, string>
     */
    protected function existingTranslations(string $locale): array
    {
        if (File::exists($this->langPath($locale))) {
            $contents = json_decode(File::get($this->langPath($locale)), true);
        } else {
            $contents = [];
        }

        return $contents;
    }

    /**
     * Return path to the language file.
     */
    protected function langPath(string $locale): string
    {
        return lang_path($locale.'.json');
    }

    /**
     * Update the language file with new translation strings.
     */
    protected function storeTranslations(Collection $extracted, string $locale, array $contents): void
    {
        $strings = $extracted->mapWithKeys(function (?string $item) use ($locale, $contents) {
            return [
                $item => $contents[$item] ?? null,
            ];
        });

        File::put($this->langPath($locale), $strings->toJson(JSON_UNESCAPED_UNICODE));
    }
}
