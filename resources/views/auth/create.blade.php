<x-layout title="Sign in">
    <x-card>
        <form class="flex flex-col gap-4" action="{{ route('auth.store', ['job_redirect' => request('job_redirect')]) }}" method="POST">
            @csrf
            <div>
                <x-label for="email">Email</x-label>
                <x-text-input placeholder="Email" name="email" value="{{ old('email') }}"/>
            </div>
            <div>
                <x-label for="password">Password</x-label>
                <x-text-input type="password" placeholder="Password" name="password" value="{{ old('password') }}"/>
            </div>
            <div class="flex justify-between text-sm font-medium">
                <x-checkbox-input name="remember">Remember-me</x-checkbox-input>
                <x-link href="#">Forget password?</x-link>
            </div>
            <div class="flex flex-col gap-4 items-center">
                <x-button class="mx-auto w-full" type="submit">Login</x-button>
                <x-link href="{{ route('home') }}">Back to home</x-link>
            </div>
        </form>
    </x-card>
</x-layout>