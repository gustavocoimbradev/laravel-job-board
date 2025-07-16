<x-layout title="Applying for {{ $job->title }} at {{ $job->employer->company_name }}">
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />
    <x-job-card :$job/>
    <x-card class="mt-6">
        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary">Expected salary</x-label>
                <x-text-input type="number" name="expected_salary" value="{{ old('expected_salary') }}"/>
            </div>
            <div class="mb-4">
                <x-label for="expected_salary">Upload CV</x-label>
                <x-text-input type="file" name="cv" value="{{ old('cv') }}"/>
            </div>
            <x-button type="submit" class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>