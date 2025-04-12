<?php

namespace App\Http\Controllers\Backend;

use App\Models\OthersSkill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OthersSkillController extends Controller
{
    // Others Skill View Function
    public function OthersSkill_View()
    {
        // Using the model to get all records
        $all_skills = OthersSkill::all();
        return view('backend.others_skills.view_skills', compact('all_skills'));
    } // End Method

    // Others Skill Create Function
    public function OthersSkill_Create(Request $request)
    {
        // dd($request->all());
        // Validation
        $request->validate([
            'name' => 'required|unique:others_skills',
        ], [
            'name.required' => 'The name is required',
            'name.unique' => 'The name must be unique',
        ]);
        dd($request->all());

        // Prepare data for creation
        $data = [
            'name' => $request->name,
            'status' => $request->has('status') ? 1 : 0,
            'created_at' => Carbon::now(),
        ];

        // Create new OthersSkill record
        OthersSkill::create($data);

        // Redirect with notification
        return redirect()->back()->with('success', 'Other-Skill added successfully!');
    } // End Method

    // Others Skill Edit Function
    public function OthersSkill_Edit($id)
    {
        // Using the model to find the record by id
        $edit = OthersSkill::findOrFail($id);
        return view('backend.others_skills.edit_skill', compact('edit'));
    } // End Method

    // Others Skill Status Function
    public function OthersSkill_Status(Request $request)
    {
        // Find the skill by slug
        $skill = OthersSkill::where('slug', $request->slug)->firstOrFail();

        // Toggle the status
        $skill->status = $skill->status == '1' ? '0' : '1';
        $skill->save();

        // Redirect with notification
        $message = $skill->status == '1' ? 'Skill Status Activated!' : 'Skill Status Deactivated!';
        $notification = ['message' => $message, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    } // End Method

    // Others Skill Delete Function
    public function OthersSkill_Delete(Request $request)
    {
        // Find the skill by slug and delete it
        $skill = OthersSkill::where('slug', $request->slug)->firstOrFail();
        $skill->delete();

        // Redirect with notification
        $notification = ['message' => 'Skill Deleted Successfully!', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    } // End Method
}
