<?php

namespace ATStudio\TranslationManager\Livewire;

use ATStudio\TranslationManager\Traits\HasFeedback;
use ATStudio\TranslationManager\Traits\HasMenu;
use ATStudio\TranslationManager\Traits\HasTabs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ListTranslations extends Component
{
    use HasFeedback;
    use HasMenu;
    use HasTabs;

    public Collection $allTranslations;

    public Collection $missingTranslations;

    public Collection $translations;

    public function mount()
    {
        $this->menu = $this->fetchLocales();
        $this->changeLocale($this->defaultLocale());
        $this->goToAll();
    }

    public function save()
    {
        $translations = $this->validate([
            'translations' => 'array',
        ])['translations'];

        if ($this->currentTab === 'missing') {
            $translations = $this->allTranslations->merge($translations);
        }

        File::put(
            $this->langFile(),
            json_encode(collect($translations)->mapWithKeys([$this, 'replaceDots'])->toArray(), JSON_UNESCAPED_UNICODE),
        );

        $this->addFeedback('Successfully Saved!', 'Translations have been saved in the language file.');
    }

    public function render()
    {
        return view('tm::livewire.list-translations')->layout('tm::components.layout');
    }

    public function changeLocale(string $locale): void
    {
        $this->currentLocale = $locale;

        $this->allTranslations = $this->fetchTranslations();
        $this->missingTranslations = $this->fetchMissingTranslations();
        $this->translations = $this->isSelectedTab('all') ? $this->allTranslations : $this->missingTranslations;
    }

    public function goToAll(): void
    {
        $this->currentTab = 'all';
        $this->translations = $this->fetchTranslations();
    }

    public function goToMissing(): void
    {
        $this->currentTab = 'missing';
        $this->translations = $this->fetchMissingTranslations();
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

    protected function fetchTranslations(): Collection
    {
        if (!File::exists($this->langFile())) {
            return collect([]);
        }

        return collect(json_decode(File::get($this->langFile()), associative: true))->mapWithKeys([$this, 'replaceDots']);
    }

    protected function fetchMissingTranslations(): Collection
    {
        return $this->fetchTranslations()->filter(fn(?string $translation) => !$translation);
    }

    protected function langFile(): string
    {
        return lang_path($this->currentLocale.'.json');
    }
}
