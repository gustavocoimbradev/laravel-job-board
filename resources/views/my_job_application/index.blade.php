<x-layout title="My Job Applications">
    <x-breadcrumbs :links="['My Job Applications' => '#']" />
    <div class="flex flex-col gap-6">
        @forelse ($applications as $application)
            <x-job-card :job="$application->job">
                <div class="text-cyan-900 text-sm">Your expected salary: $ {{ number_format($application->expected_salary) }}</div>
            </x-job-card> 
        @empty
            <span class="text-center text-white mt-5">Nothing found</span>
        @endforelse
    </div>
</x-layout>