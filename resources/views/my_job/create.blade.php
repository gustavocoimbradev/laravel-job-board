<x-layout title="Create a job">
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" />
    <x-card>
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title">Job title</x-label>
                    <x-text-input name="title" value="{{ old('title') }}" />
                </div>
                <div>
                    <x-label for="location">Job location</x-label>
                    <x-text-input name="location" value="{{ old('location') }}" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary">Salary</x-label>
                    <x-text-input name="salary" value="{{ old('salary') }}" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description">Description</x-label>
                    <x-textarea-input name="description">{{ old('description') }}</x-textarea-input>
                </div>
                <div>
                    <x-label for="experience">Experience</x-label>
                    <x-radio-group :current-value="old('experience')" name="experience" :options="\App\Models\Job::$experience" :all-option="false"/>
                </div>
                <div>
                    <x-label for="category">Category</x-label>
                    <x-radio-group :current-value="old('category')" name="category" :options="\App\Models\Job::$category" :all-option="false" />
                </div>
                <div class="flex items-center gap-4 justify-center pt-7 mt-6 border-t border-cyan-600 col-span-2">
                    <x-button type="submit" class="w-full">Create job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>