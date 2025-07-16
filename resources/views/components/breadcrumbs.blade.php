<nav {{ $attributes }}>
    <ul class="flex gap-2 mb-6">
        <li>
            <x-link class="{{ count($links) ? 'text-white/50' : 'text-white/50' }}" href="/">Home</x-link>
        </li>
        @foreach ($links as $label => $link)
            <li class="text-white/50">
                <span>/</span>
            </li>
            <li>
                <x-link href="{{ $link }}" class="{{ $loop->last ? 'text-white' : 'text-white/50' }}">
                    {{ $label }}
                </x-link>
            </li>
        @endforeach
    </ul>
</nav>