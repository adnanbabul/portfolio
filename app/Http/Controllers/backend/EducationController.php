<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $all_education = Education::all();
        return view('backend.education.index', compact('all_education'));
    }

    public function create()
    {
        return view('backend.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institute_name' => 'required|string|max:255',
            'degree_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'nullable|date_format:Y-m',
            'current' => 'nullable|boolean',
        ]);

        Education::create([
            'institute_name' => $request->input('institute_name'),
            'degree_name' => $request->input('degree_name'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'current' => $request->has('current') ? true : false,
        ]);

        return redirect()->route('education.index')->with('success', 'Education added successfully!');
    }


    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return response()->json(['education' => $education]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'institute_name' => 'required|string|max:255',
            'degree_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'nullable|date_format:Y-m',
        ]);

        $education = Education::findOrFail($id);
        $education->update([
            'institute_name' => $request->input('institute_name'),
            'degree_name' => $request->input('degree_name'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'current' => $request->has('current') ? 1 : 0,
        ]);

        return response()->json(['success' => true, 'message' => 'Education updated successfully!']);
    }

    public function destroy($id)
    {
        Education::findOrFail($id)->delete();
        return redirect()->route('education.index')->with('success', 'Education deleted successfully!');
    }
}


