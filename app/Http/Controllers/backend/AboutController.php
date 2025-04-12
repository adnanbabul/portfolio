<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\About;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    // About Section
    public function About()
    {
        $edit_about = About::first();

        if ($edit_about) {
            return view('backend.about.update', compact('edit_about'));
        } else {
            return view('backend.about.create', compact('edit_about'));
        }
    } // End Method

    public function About_Store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "short_title" => "required|max:255",
            "short_Description" => "required",
            "logn_Description" => "required",
            "about_image" => "required|image|mimes:jpg,png,jpeg,gif|max:2048",
        ]);

        $data = $request->only(['title', 'short_title', 'short_Description', 'logn_Description']);
        $data['created_at'] = Carbon::now();

        if ($request->hasFile('about_image')) {
            $image_name = uniqid() . '.' . $request->about_image->getClientOriginalExtension();
            Image::make($request->about_image)
                ->resize(749, 667)
                ->save(public_path('backend/image/about/' . $image_name));
            $data['about_image'] = 'backend/image/about/' . $image_name;
        }
        About::create($data);

        return redirect()->route('about.info')
            ->with('message', 'About information added successfully!')
            ->with('alert-type', 'success');
    }


    // Update About Function
    public function About_Info_Update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $data = $request->only(['title', 'short_title', 'short_Description', 'logn_Description']);
        $data['updated_at'] = Carbon::now();
        if ($request->hasFile('about_image')) {
            @unlink($about->about_image);
            $image_name = uniqid() . '.' . $request->about_image->getClientOriginalExtension();
            Image::make($request->about_image)->save('backend/image/about/' . $image_name);
            $data['about_image'] = 'backend/image/about/' . $image_name;
        }
        $about->update($data);

        return redirect()->back()->with('message', 'Update About Information!')->with('alert-type', 'success');
    } // End Method
}
