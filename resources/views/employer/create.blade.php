<x-layout title="Create employer">
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf 
            <div class="mb-4">
                <x-label for="company_name">Company Name</x-label>
                <x-text-input name="company_name" value="{{ old('company_name') }}"/>
            </div>
            <x-button type="submit" class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>