@props(['name' => '', 'type' => 'text'])

@php
    $defaults = [
        'name' => $name,
        'type' => $type,
        'class' => 'bg-white/12 border border-white/12  rounded-xl p-4 w-full my-4',
        'value' => old($name),
    ];
@endphp

<input {{ $attributes($defaults) }}>

<x-error :error="$errors->first($name)" />