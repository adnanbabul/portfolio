<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Carbon;

class ExperienceController extends Controller
{
    public function index()
    {
        $all_experience = Experience::all();
        return view('backend.experience.index', compact('all_experience'));
    }

    public function create()
    {
        return view('backend.experience.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'nullable|date_format:Y-m',
            'current' => 'nullable|boolean',
            'responsibilities' => 'nullable|string',
        ]);

        Experience::create([
            'job_title' => $request->input('job_title'),
            'company' => $request->input('company'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'current' => $request->has('current') ? true : false,
            'responsibilities' => $request->input('responsibilities')
        ]);

        return redirect()->route('experience.index')->with('success', 'Experience added successfully!');
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return response()->json(['experience' => $experience]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'responsibilities' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        $experience = Experience::findOrFail($id);

        $experience->update([
            'job_title' => $request->job_title,
            'company' => $request->company,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'current' => $request->current ? 1 : 0,
            'responsibilities' => $request->responsibilities,
            'location' => $request->location,
        ]);

        return response()->json(['success' => 'Experience updated successfully.']);
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();
        return redirect()->route('experience.index')->with('success', 'Experience deleted successfully!');
    }
}
