<label for="{{ $name }}-{{ $value }}" class="mb-1 flex items-center">
    <input
        class="accent-cyan-600"
        type="radio"
        name="{{ $name }}"
        id="{{ $name }}-{{ $value }}"
        value="{{ $value }}"
        @checked(isset($checked) ? $checked : old($name, request($name)) == $value)
    />
    <span class="ml-2">{{ $label }}</span>
</label>
