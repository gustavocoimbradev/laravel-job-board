<div>
    @if ($allOption)
        <x-radio-input name="{{ $name }}" label="All" value="all" :checked="$currentValue === 'all'" />
    @endif
    @foreach ($options as $value=>$label)
        <x-radio-input name="{{ $name }}" label="{{ $label }}" value="{{ $value }}" :checked="$currentValue == $value" />
    @endforeach
    @error($name)
        <div class="text-sm mt-2 text-red-700">
            {{ $message }}
        </div>
    @enderror
</div>