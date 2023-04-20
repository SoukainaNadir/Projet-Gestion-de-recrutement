@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#F9AF16] focus:ring-[#F9AF16] rounded-md shadow-sm']) !!}>
