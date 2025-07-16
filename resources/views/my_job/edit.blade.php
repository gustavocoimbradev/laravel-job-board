<x-layout title="Edit job">
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), $myJob->title => route('my-jobs.index'), 'Edit' => '#']" />
    <x-card>
        <form action="{{ route('my-jobs.update', $myJob) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title">Job title</x-label>
                    <x-text-input name="title" value="{{ $myJob->title }}" />
                </div>
                <div>
                    <x-label for="location">Job location</x-label>
                    <x-text-input name="location" value="{{ $myJob->location }}" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary">Salary</x-label>
                    <x-text-input name="salary" value="{{ $myJob->salary }}" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description">Description</x-label>
                    <x-textarea-input name="description">{{ $myJob->description }}</x-textarea-input>
                </div>
                <div>
                    <x-label for="experience">Experience</x-label>
                    <x-radio-group :current-value="$myJob->experience" name="experience" :options="\App\Models\Job::$experience" :all-option="false"/>
                </div>
                <div>
                    <x-label for="category">Category</x-label>
                    <x-radio-group :current-value="$myJob->category" name="category" :options="\App\Models\Job::$category" :all-option="false" />
                </div>
                <div class="flex items-center gap-4 justify-center pt-7 mt-6 border-t border-cyan-600 col-span-2">
                    <x-button type="submit" class="w-full">Create job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>