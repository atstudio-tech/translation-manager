<?php

namespace ATStudio\TranslationManager\Traits;

trait HasTabs
{
    public string $currentTab = '';

    protected string $defaultTab = 'all';

    public function isSelectedTab(string $tab): bool
    {
        return $this->currentTab === $tab;
    }

    public function changeTab(string $tab): void
    {
        $this->currentTab = $tab;
    }
}
