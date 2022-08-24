<?php

use Facades\ATStudio\TranslationManager\TranslationManager;

it('scans simple strings', function () {
    $str = File::get(__DIR__ . '/samples/simple-text.blade.php');

    expect(TranslationManager::parse($str))
        ->toHaveCount(3)
        ->toContain('Using Blade directive')
        ->toContain('A __ function alias')
        ->toContain('Another helper function');
});

// todo - Teach the parser to handle escapes
it('does not understand apostrophes and escapes', function () {
    $str = File::get(__DIR__ . '/samples/apostrophe-escaped-text.blade.php');

    expect(TranslationManager::parse($str))
        ->toHaveCount(2)
        ->not()
        ->toContain("I'm coding right now.")
        ->not()
        ->toContain('It goes "HERE":');
});

it('parses a line with multiple functions', function () {
    $str = "Line::label(__('Check It Out'), route('home');";

    expect(TranslationManager::parse($str))
        ->toHaveCount(1)
        ->toContain('Check It Out');
});

it('allows parentheses', function () {
    $str = <<<'PHP'
    __("This string has (parentheses).");
    PHP;

    expect(TranslationManager::parse($str))
        ->toHaveCount(1)
        ->toContain('This string has (parentheses).');
});

it('makes a good choice', function () {
    $str = <<<'PHP'
    trans_choice('1 element|:count multiple elements', 4);
    PHP;

    expect(TranslationManager::parse($str))
        ->toHaveCount(1)
        ->toContain('1 element|:count multiple elements');
});

it('understands different call methods', function () {
    $str = File::get(__DIR__ . '/samples/different-styles.blade.php');

    expect(TranslationManager::parse($str))
        ->toHaveCount(7)
        ->toContain('This one is the shortest __ one.')
        ->toContain("Quite a traditional directive, but it's not the shortest one.")
        ->toContain('This one is not my favorite.')
        ->toContain("That'll do.")
        ->toContain('1 person|:count people')
        ->toContain(':count string|:count strings')
        ->toContain('yes|no');
});
