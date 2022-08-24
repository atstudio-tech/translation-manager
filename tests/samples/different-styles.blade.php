@php
    __('This one is the shortest __ one.');
@endphp

@lang("Quite a traditional directive, but it's not the shortest one.")

{{ Lang::get('This one is not my favorite.') }}

{{ trans("That'll do.") }}

{{ route('not-translation') }}

@choice('1 person|:count people', 5)

{{ trans_choice(':count string|:count strings', 2) }}

{{ Lang::choice('yes|no', 1 % 2 === 0) }}
