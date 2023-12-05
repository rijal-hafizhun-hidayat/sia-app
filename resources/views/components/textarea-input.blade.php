@props(['disabled' => false])

<textarea rows="10" cols="70" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{ $value ?? $slot }}</textarea>
