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
        $foldersToScan = config('tm.folders');
        $files = collect([]);
        $strings = [];

        foreach ($foldersToScan as $folder) {
            $files->add(File::allFiles($folder));
        }

        /** @var Collection<SplFileInfo> $files */
        $files = $files->flatten();

        foreach ($files as $file) {
            // dump($file->getContents());
            preg_match_all('/__\([\'"](.+)[\'"]\)/', $file->getContents(), $matches);

            if ($matches[1]) {
                $strings = array_merge($strings, $matches[1]);
            }
        }

        dd($strings);
    }
}
