@props(['value'])

<label {{ $attributes }} class="pb-2">
    {{ $value ?? $slot }}
</label>
