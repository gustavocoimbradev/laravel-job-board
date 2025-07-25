<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Job::class);
        $jobs = Job::query();
        $jobs->when(request('search'), function($query) {
            $query->where(function($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhereHas('employer', function($query) {
                    $query->where('company_name', 'like', '%' . request('search') . '%');
                });
            });
        });
        $jobs->when(request('min_salary'), function($query){
            $query->where('salary', '>=', request('min_salary'));
        });
        $jobs->when(request('max_salary'), function($query){
            $query->where('salary', '<=', request('max_salary'));
        });
        $jobs->when(request('experience') && request('experience') !== 'all', function($query){
            $query->where('experience', '=', request('experience'));
        });
        $jobs->when(request('category') && request('category') !== 'all', function($query){
            $query->where('category', '=', request('category'));
        });
        return view('job.index', ['jobs' => $jobs->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $this->authorize('view', $job);
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
