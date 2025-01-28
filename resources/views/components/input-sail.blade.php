@props(['label', 'name'])

@php
    $error = $errors->has($name);
@endphp

<div class="relative">
    <input type="text" name="{{ $name }}"
        {{ $attributes->merge(['class' => $error ? 'block w-full rounded-md border-red-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500' : 'peer block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500', 'placeholder' => ' ', 'autocomplete' => 'off']) }}>
    <label
        {{ $attributes->merge(['class' => $error ? 'after:ml-0.5 after:text-red-500 after:content-["*"] peer-focus:base absolute left-2 top-0 z-10 -translate-y-2 transform bg-white px-1 text-xs text-gray-500 transition-all peer-placeholder-shown:translate-y-3 peer-placeholder-shown:text-sm peer-focus:-translate-y-2 peer-focus:text-xs' : 'peer-focus:base absolute left-2 top-0 z-10 -translate-y-2 transform bg-white px-1 text-xs text-gray-500 transition-all peer-placeholder-shown:translate-y-3 peer-placeholder-shown:text-sm peer-focus:-translate-y-2 peer-focus:text-xs']) }}>{{ $label }}</label>
    @if ($error)
        <p class="mt-1 text-sm text-red-500">{{ $errors->first($name) }}</p>
    @endif
</div>
