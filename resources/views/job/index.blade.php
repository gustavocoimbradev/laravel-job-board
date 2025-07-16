<x-layout title="Jobs">
    <x-breadcrumbs :links="['Jobs' => route('jobs.index')]" />

    <x-card class="mb-6 text-sm">
        <form form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="search">Search</x-label>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>
                <div>
                    <x-label for="min_salary">Salary</x-label>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <x-label for="experience">Experience</x-label>
                    <x-radio-group :current-value="request('experience')??'all'" :allOption="true" name="experience" :options="\App\Models\Job::$experience" />
                </div>
                <div>
                    <x-label for="category">Category</x-label>
                    <x-radio-group :current-value="request('category')??'all'" name="category" :options="\App\Models\Job::$category" :allOption="true" />
                </div>
            </div>
            <div class="flex items-center gap-4 justify-center pt-7 mt-6 border-t border-cyan-600">
                <x-button type="submit">Filter</x-button>
            </div>
        </form>
    </x-card>

    <div class="flex flex-col gap-6"> 
        @forelse($jobs as $job)
            <x-job-card :$job showButton />
        @empty
            <span class="text-center text-white mt-5">No job found</span>
        @endforelse
    </div>
</x-layout>