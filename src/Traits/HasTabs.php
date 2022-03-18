<?php

namespace ATStudio\TranslationManager\Traits;

trait HasTabs
{
    public string $currentTab = '';

    protected string $defaultTab = 'all';

    public function prefillTab(): void
    {
        if (!request()->query('tab')) {
            $this->goToTab($this->defaultTab);
        } else {
            $this->currentTab = request()->query('tab');
        }
    }

    public function isSelectedTab(string $tab): bool
    {
        return $this->currentTab === $tab;
    }

    public function goToTab(string $tab): void
    {
        $this->currentTab = $tab;
        $this->redirect('?tab='.$tab);
    }
}
