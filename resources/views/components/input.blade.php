@props(['disabled' => false, 'name' => $name])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['name' => $name, 'class' => 'border-2 hover:border-sky-200 border-gray-200 focus:border-sky-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
@error($name)
<p class="text-rose-700 font-medium">
    {{$message}}    
</p>
@enderror
