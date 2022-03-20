<?php

namespace ATStudio\TranslationManager\Livewire;

use ATStudio\TranslationManager\TranslationManager;
use Livewire\Component;

class ScanAction extends Component
{
    public function render()
    {
        return view('tm::livewire.scan-action');
    }

    public function scan()
    {
        TranslationManager::scan();
    }
}
