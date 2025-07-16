<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class MyJobController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        $jobs = auth()->user()->employer->jobs()->withTrashed()->latest()->get();
        return view('my_job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Job::class);
        $experiences = '';
        foreach (Job::$experience as $value=>$label){
            $experiences .= ','.$value;
        }
        $categories = '';
        foreach (Job::$category as $value=>$label){
            $categories .= ','.$value;
        }
        
        $validatedData = $request->validate([
            'title' => 'required|string|min:3',
            'location' => 'required|string|min:3',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'.$experiences,
            'category' => 'required|in:'.$categories,
        ]);

        auth()->user()->employer->jobs()->create($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job was created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', compact('myJob'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Job $myJob, Request $request)
    {
        $this->authorize('update', $myJob);
        $experiences = '';
        foreach (Job::$experience as $value=>$label){
            $experiences .= ','.$value;
        }
        $categories = '';
        foreach (Job::$category as $value=>$label){
            $categories .= ','.$value;
        }
        
        $validatedData = $request->validate([
            'title' => 'required|string|min:3',
            'location' => 'required|string|min:3',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'.$experiences,
            'category' => 'required|in:'.$categories,
        ]);

        $myJob->update($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $myJob->delete();
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}
