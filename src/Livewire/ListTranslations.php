<?php

namespace ATStudio\TranslationManager\Livewire;

use ATStudio\TranslationManager\Traits\HasFeedback;
use ATStudio\TranslationManager\Traits\HasTabs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ListTranslations extends Component
{
    use HasFeedback;
    use HasTabs;

    public Collection $allTranslations;

    public Collection $missingTranslations;

    public Collection $translations;

    public function mount()
    {
        $this->prefillTab();

        $this->allTranslations = collect(json_decode(File::get(lang_path('fr.json')), associative: true))->mapWithKeys([$this, 'replaceDots']);

        $this->missingTranslations = $this->allTranslations->filter(fn(?string $translation) => !$translation);
        $this->translations = $this->isSelectedTab('missing') ? $this->missingTranslations : $this->allTranslations;
    }

    public function save()
    {
        $translations = $this->validate([
            'translations' => 'array',
        ])['translations'];

        if ($this->currentTab === 'missing') {
            $translations = $this->allTranslations->merge($translations);
        }

        File::put(lang_path('fr.json'), json_encode(collect($translations)->mapWithKeys([$this, 'replaceDots'])->toArray()));

        $this->addFeedback('Successfully Saved!', 'Translations have been saved in the language file.');
    }

    public function render()
    {
        return view('tm::livewire.list-translations')->layout('tm::components.layout');
    }

    public function escapeDots(string $text): string
    {
        if (str_contains($text, '{{__dot__}}')) {
            return str_replace('{{__dot__}}', '.', $text);
        }

        return str_replace('.', '{{__dot__}}', $text);
    }

    public function replaceDots(?string $value, string $key): array
    {
        return [
            $this->escapeDots($key) => $value,
        ];
    }
}
