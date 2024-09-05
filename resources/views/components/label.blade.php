@props(['value','color'])

<label {{ $attributes->merge(['class' => 'inline-flex items-baseline rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-800 md:mt-2 lg:mt-0']) }}>
    {{ $value ?? $slot }}
</label>