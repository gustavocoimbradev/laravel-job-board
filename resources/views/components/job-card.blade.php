<x-card {{ $attributes->class([isset($outlined) ? '!bg-transparent !shadow-none !border !border-cyan-600' : '']) }}>
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium">
            {{ $job->title }}
        </h2>
        <div class="text-cyan-900">
            $ {{ number_format($job->salary) }}
        </div>
    </div>
    <div class="mb-4 flex justify-between text-sm text-cyan-900 items-center">
        <div class="flex gap-4 items-center">
            <div>{{ $job->employer->company_name }}</div>
            <div>{{ $job->location }}</div>
            @if ($job->deleted_at)
                @if (auth()->user()->employer->company_name === $job->employer->company_name)
                    <div class="text-xs text-red-600">
                        Deleted {{ $job->deleted_at->diffForHumans() }}
                    </div>
                @endif
            @endif
        </div>
        <div class="flex gap-3 items-center">
            <x-tag>
                <a
                    href="{{ route('jobs.index', ['experience' => $job->experience]) }}">{{ ucfirst($job->experience) }}</a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category]) }}">{{ ucfirst($job->category) }}</a>
            </x-tag>
        </div>
    </div>
    @if (isset($showDescription))
        <p class="text-sm mb-4 text-cyan-900">{!! nl2br(e($job->description)) !!}</p>
    @endif
    {{ $slot }}
    @if (isset($showButton) && (!$job->deleted_at))
        <x-link-button href="{{ route('jobs.show', $job) }}">Check opportunity</x-link-button>
    @endif
    @if (isset($showApplicationButton) && auth()->user() && (!$job->deleted_at))
        @can('apply', $job)
            <x-link-button href="{{ route('job.application.create', $job) }}"
                class="!w-full !max-w-full text-center bg-cyan-800 hover:!bg-cyan-900">Apply for this job</x-link-button>
        @else
            <x-link-button href="#"
                class="!w-full !max-w-full text-center bg-cyan-800 hover:!bg-cyan-900 opacity-40 !cursor-not-allowed">Apply for
                this job</x-link-button>
            <span class="text-center block mt-3 text-sm">You have already applied for this opportunity.</span>
        @endcan
    @endif
    @if (isset($showApplicationButton) && !auth()->user() && (!$job->deleted_at))
        <x-link-button href="#"
            class="!w-full !max-w-full text-center bg-cyan-800 hover:!bg-cyan-900 opacity-40 !cursor-not-allowed">Apply for
            this job</x-link-button>
        <span class="text-center block mt-3 text-sm">You need to <x-link
                href="{{ route('auth.create', ['job_redirect' => $job]) }}">sign in</x-link> to apply for this
            opportunity</span>
    @endif


</x-card>