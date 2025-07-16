<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="mx-auto my-10 max-w-2xl flex flex-col h-full text-slate-700 px-4 bg-linear-to-r from-cyan-500 to-blue-700">
        @if (!request()->routeIs('auth.create'))
            <nav class="mb-8 flex justify-between text-lg font-medium">
                <ul class="flex items-center gap-6">
                    <li>
                        <x-link href="{{ route('jobs.index') }}" class="text-white">Jobs</x-link>
                    </li>
                    @auth
                        <li>
                            <x-link href="{{ route('my-job-applications.index') }}" class="text-white">Applications</x-link>
                        </li>
                        <li>
                            <x-link href="{{ route('my-jobs.index') }}" class="text-white">My Jobs</x-link>
                        </li>
                    @endauth
                </ul>
                <ul class="flex items-center gap-6">
                    @auth
                        <li>
                            <div class="text-white/50 text-sm flex flex-col items-end">
                                <span>{{ auth()->user()->name }}</span>
                                <small>{{ auth()->user()->email }}</small></div>
                        </li>
                        <li>
                            <form action="{{ route('auth.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" class="bg-white/80 !text-cyan-800 hover:bg-white">Logout</x-button>
                            </form>
                        </li>
                    @else 
                        <li>
                            <form action="{{ route('login') }}" method="GET">
                                @csrf
                                <x-button type="submit" class="bg-white/80 !text-cyan-800 hover:bg-white">Sign in</x-button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
        @endif
        @if (session('success'))
            <x-card class="py-4 !bg-green-100/80 mb-6 border-l-2 border-green-800 text-green-800">
                <h3 class="font-semibold">Success!</h3>
                <p>{{ session('success') }}</p>
            </x-card>
        @endif
        @if (session('error'))
            <x-card class="py-4 !bg-red-100 mb-6 border-l-2 border-red-800 text-red-800">
                <h3 class="font-semibold">Error</h3>
                <p>{{ session('error') }}</p>
            </x-card>
        @endif
        {{ $slot }}
    </body>
</html>
