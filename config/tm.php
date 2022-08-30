<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Locales
    |--------------------------------------------------------------------------
    |
    | A list of available and source locales.
    | These will be used for creating translation files.
    |
    */

    'locales' => [
        'en' => 'English',
        'fr' => 'Français',
        'ru' => 'Русский',
        'sk' => 'Slovenčina',
    ],

    // This is the locale that will be used as a source for all translations.
    'source_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Folders to Scan
    |--------------------------------------------------------------------------
    |
    | Specify a list of folders to scan for translation strings.
    | These paths must be relative to the root of your project.
    |
    */

    'folders' => [
        'app/Http/Controllers',
        'resources/views',
    ],

];
