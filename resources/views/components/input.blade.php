@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-primary tranisiton-all duration-200 focus:ring-2 focus:px-4 delay-75 focus:ring-primary rounded-md shadow-sm']) !!}>
