<div>
    <textarea name="{{ $name }}"id="{{ $name }}"
        @class([
            'border border-cyan-600 p-3 rounded-md w-full outline-none focus:border-cyan-700 transition-all ease-in-out duration-300 placeholder:text-cyan-800/40',
            'border-red-700' => $errors->has($name)
        ])
    >{{ $slot }}</textarea>
    @error($name)
        <div class="text-sm mt-2 text-red-700">
            {{ $message }}
        </div>
    @enderror
</div>