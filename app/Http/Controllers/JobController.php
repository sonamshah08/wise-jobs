<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyJob;
use App\Models\Company;

class JobController extends Controller
{
   public function index(Request $request)
    {

        $query = CompanyJob::with('company');

        // Apply filters if present
        if ($request->has('position_type') && $request->position_type) {
            $query->where('type', $request->position_type);
        }

        if ($request->has('salary') && $request->salary) {
            $query->where('salary', '>=', $request->salary);
        }

        if ($request->has('company') && $request->company) {
            $query->where('company', 'like', '%' . $request->company . '%');
        }

        if ($request->has('location') && $request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $activeJobsCount = $query->count();
        $jobs = $query->latest()->paginate(2);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('jobs.partials.job-list', compact('jobs'))->render(),
                'next_page' => $jobs->nextPageUrl(),
            ]);
        }

        return view('jobs.index', compact('jobs', 'activeJobsCount'));

    }

    public function show($id)
    {
        $job = CompanyJob::with('company')->findOrFail($id);

        //dd($job);
        return view('jobs.show', compact('job'));
    }

    public function filter(Request $request)
    {
        $query = CompanyJob::query();

        if ($request->filled('position_type')) {
            $query->where('type', $request->input('position_type'));
        }
        // if ($request->filled('salary')) {
        //     $query->where('salary', '>=', $request->input('salary'));
        // }
        // if ($request->filled('company')) {
        //     $query->where('company_id', $request->input('company'));
        // }
        // if ($request->filled('location')) {
        //     $query->where('location', 'LIKE', '%' . $request->input('location') . '%');
        // }

        $jobs = $query->latest()->paginate(2);

       $html = view('jobs.partials.job-list', compact('jobs'))->render();

        return response()->json(['html' => $html]);
    }
}
