<?php

namespace ATStudio\TranslationManager\Traits;

trait HasFeedback
{
    public array $feedback = [
        'title' => '',
        'message' => '',
        'exists' => false,
    ];

    public function addFeedback(string $title, string $message): void
    {
        $this->feedback = [
            ...compact('title', 'message'),
            'exists' => true,
        ];
    }

    public function removeFeedback(): void
    {
        $this->feedback = [
            'title' => '',
            'message' => '',
            'exists' => false,
        ];
    }
}
