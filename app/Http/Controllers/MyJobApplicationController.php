<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {   
        $applications = auth()->user()?->jobApplications()
            ->with('job', function($query){
                $query->withTrashed();
            })
            ->latest()
            ->get();
        return view('my_job_application.index', compact('applications'));
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
