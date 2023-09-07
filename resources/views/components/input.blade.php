@props(['type', 'name', 'value' => ''])
<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
    {{ $attributes->class(['form-control']) }} />
