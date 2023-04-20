@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-[14px] text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
