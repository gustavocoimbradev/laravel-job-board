<x-layout title="{{ $job->title }}">
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job showDescription showApplicationButton />
    <x-card class="mt-6">
        <h2 class="mb-4 text-lg font-medium">More opportunities from {{$job->employer->company_name}}</h2>
        <div class="text-sm text-cyan-900 flex flex-col gap-4">
            @foreach ($job->employer->jobs as $job)
                <x-job-card :$job outlined showButton />
            @endforeach
        </div>
    </x-card>
</x-layout>