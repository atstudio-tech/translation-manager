<?php

namespace ATStudio\TranslationManager\Livewire;

use ATStudio\TranslationManager\Entities\Feedback;
use ATStudio\TranslationManager\Traits\HasFeedback;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ListTranslations extends Component
{
    use HasFeedback;

    public array $translations = [];

    public function mount()
    {
        $this->translations = json_decode(File::get(lang_path('fr.json')), associative: true);
    }

    public function save()
    {
        $data = $this->validate([
            'translations' => 'array',
        ]);

        File::put(lang_path('fr.json'), json_encode($data['translations']));

        $this->addFeedback('Successfully Saved!', 'Translations have been saved in the language file.');
    }

    public function render()
    {
        return view('tm::livewire.list-translations')->layout('tm::components.layout');
    }
}
