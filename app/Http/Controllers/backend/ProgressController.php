<?php

namespace App\Http\Controllers\backend;

use App\Models\ProgressBar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProgressController extends Controller
{
    // Progress View Function
    public function Progress_View()
    {
        // Using the model to get all records
        $all_progress = ProgressBar::all();
        return view('backend.progress_bar.view_progress', compact('all_progress'));
    } // End Method

    // Progress Create Function
    public function Progress_Create(Request $request)
    {
        // dd($request->all());

        // Validation
        $request->validate([
            'name' => 'required|unique:progress_bar',
            'percentage' => 'required|numeric|min:0|max:100',
            // 'skill_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => "The Name is Required",
            'percentage.required' => 'The percentage is required.',
            'percentage.numeric' => 'The percentage must be a number.',
            'percentage.min' => 'The percentage must be at least 0.',
            'percentage.max' => 'The percentage may not be greater than 100.',
            // 'skill_logo.image' => 'The skill logo must be an image.',
            // 'skill_logo.mimes' => 'The skill logo must be a file of type: jpeg, png, jpg, gif.',
            // 'skill_logo.max' => 'The skill logo may not be greater than 2MB.',
        ]);

        // Prepare data for creation
        $data = [
            'name' => $request->name,
            'percentage' => $request->percentage,
            'status' => $request->has('status') ? '1' : '0',
            'slug' => Str::slug($request->name),
            'created_at' => Carbon::now(),
        ];

        // Handle file upload
        if ($request->hasFile('skill_logo')) {
            $img_name = uniqid() . '.' . $request->skill_logo->getClientOriginalExtension();
            Image::make($request->skill_logo)->resize(64, 64)->save(public_path('backend/image/progress_bar_logo/' . $img_name));
            $data['skill_logo'] = 'backend/image/progress_bar_logo/' . $img_name;
        }

        // Create new ProgressBar record
        ProgressBar::create($data);

        // Redirect with notification
        $notification = ['message' => 'Create Progress Successfully!', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    } // End Method

    // Progress Edit Function
    public function Progress_Edit($id)
    {
        // Using the model to find the record by id
        $edit = ProgressBar::findOrFail($id);
        return view('backend.progress_bar.edit_progress', compact('edit'));
    } // End Method

    // Progress Status Function
    public function Progress_Status(Request $request)
    {
        // Find the progress bar by slug
        $progressBar = ProgressBar::where('slug', $request->slug)->firstOrFail();

        // Toggle the status
        $progressBar->status = $progressBar->status == '1' ? '0' : '1';
        $progressBar->save();

        // Redirect with notification
        $message = $progressBar->status == '1' ? 'Progress Status Active!' : 'Progress Status Deactive!';
        $notification = ['message' => $message, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    } // End Method

    // Progress Delete Function
    public function Progress_Delete(Request $request)
    {
        // Find the progress bar by slug and delete it
        $progressBar = ProgressBar::where('slug', $request->slug)->firstOrFail();
        $progressBar->delete();

        // Redirect with notification
        $notification = ['message' => 'Delete Progress Successfully!', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    } // End Method
}
