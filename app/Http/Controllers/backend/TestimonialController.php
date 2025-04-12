<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function Testimonial_View()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.view', compact('testimonials'));
    }

    public function Testimonial_Create()
    {
        return view('backend.testimonial.create');
    }

    public function Testimonial_Store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'project_url' => 'nullable|url',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'The name field is required.',
            'designation.required' => 'The designation field is required.',
            'company_name.required' => 'The company name field is required.',
            'description.required' => 'The description field is required.',
            'project_url.url' => 'The project URL must be a valid URL.',
            'image_path.image' => 'The image must be an image file.',
            'image_path.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image_path.max' => 'The image size must not exceed 2MB.',
        ]);

        $imagePath = null;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 310)->save(public_path('backend/image/testimonial/' . $imageName));
            $imagePath = 'backend/image/testimonial/' . $imageName;
        }

        Testimonial::create([
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'company_name' => $request->input('company_name'),
            'description' => $request->input('description'),
            'project_url' => $request->input('project_url'),
            'image_path' => $imagePath,
            'status' => $request->input('status', 0),
        ]);


        return redirect()->route('testimonial.view')->with('success', 'Testimonial created successfully.');
    }

    public function Testimonial_Edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    public function Testimonial_Update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'video_url' => 'nullable|url',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($testimonial->image_path && file_exists(public_path($testimonial->image_path))) {
                unlink(public_path($testimonial->image_path));
            }

            // Save new image
            $image = $request->file('image_path');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 600)->save(public_path('images/' . $imageName));
            $data['image_path'] = 'images/' . $imageName;
        }

        $testimonial->update($data);

        return redirect()->route('testimonial.view')->with('success', 'Testimonial updated successfully.');
    }

    public function Testimonial_Destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete image
        if ($testimonial->image_path && file_exists(public_path($testimonial->image_path))) {
            unlink(public_path($testimonial->image_path));
        }

        $testimonial->delete();

        return redirect()->route('testimonial.view')->with('success', 'Testimonial deleted successfully.');
    }
}
