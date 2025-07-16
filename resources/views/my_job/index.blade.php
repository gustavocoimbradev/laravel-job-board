<x-layout title="My jobs">
    <div class="flex items-center justify-between">
        <x-breadcrumbs :links="['My Jobs' => '#']" />
        <x-link-button href="{{ route('my-jobs.create') }}" class="mb-8 text-center min-w-max">New job</x-link-button>
    </div>
    <div class="flex flex-col gap-6">
        @forelse($jobs as $job)
            <x-job-card :$job>
                <table class="text-sm text-cyan-800 w-full text-center">
                    @if ($job->jobApplications->count() > 0) 
                        <thead>
                            <tr>
                                <th class="p-2">Applicant</th>
                                <th class="p-2">Applied</th>
                                <th class="p-2">Expected salary</th>
                                <th class="p-2">Curriculum</th>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @forelse ($job->jobApplications as $application)
                            <tr class=" pt-3">
                                <td class="border-t border-cyan-800 p-2">
                                    <div>{{ $application->user->name }}</div>
                                </td>
                                <td class="border-t border-cyan-800 p-2">
                                    {{ $application->created_at->diffForHumans() }}
                                </td>
                                <td class="border-t border-cyan-800 p-2">$ {{number_format($application->expected_salary)}}</td>
                                <td class="border-t border-cyan-800 p-2">
                                    <x-link href="#">Download</x-link>
                                </td>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4">No applications yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if (!$job->deleted_at)
                    <div class="flex justify-between items-center gap-3">
                        <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" class="text-center mt-5 !bg-white !text-cyan-800">Delete</x-button>
                        </form>
                        <x-link-button href="{{ route('my-jobs.edit', $job) }}" class="text-center mt-5">Edit</x-link-button>
                    </div>
                @endif
            </x-job-card>
        @empty
            <span class="text-center text-white mt-5">No jobs yet</span>
        @endforelse
    </div>

</x-layout>