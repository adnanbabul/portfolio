<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\Seo;
use App\Models\WebsiteSetting;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    // ==================== Socials Functions Section ==============
    public function Socials()
    {
        $socials = Social::first();

        if ($socials) {
            return view('backend.setting.socials.update', compact('socials'));
        } else {
            return view('backend.setting.socials.insert_data');
        }
    }
    // End Method

    public function Socials_Insert(Request $request)
    {
        $data = $request->only(['linkedin', 'facebook', 'twitter', 'instagram', 'github', 'youtube']);
        $data['created_at'] = Carbon::now();

        Social::create($data);

        $notification = array('message' => 'Socials added Successfully!', 'alert-type' => 'success');
        return redirect()->route('socials')->with($notification);
    } // End Method

    public function Socials_Update(Request $request)
    {
        $social_id = $request->id;

        $social = Social::find($social_id);
        $social->update($request->only(['linkedin', 'facebook', 'twitter', 'instagram', 'github', 'youtube']));

        $notification = array('message' => 'Socials Information Updated!', 'alert-type' => 'success');
        return redirect()->route('socials')->with($notification);
    } // End Method
    // ==================== Socials Functions Section End ============== //


    //// ================== Seos Function Start =====================////

    public function Seos()
    {
        $seo = Seo::first();

        if ($seo) {
            return view('backend.setting.seo.update', compact('seo'));
        } else {
            return view('backend.setting.seo.insert');
        }
    } // End Method

    public function Seos_Insert(Request $request)
    {
        $data = $request->only([
            'meta_author',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'google_analytics',
            'google_verification',
            'alexa_analytics',
        ]);
        $data['created_at'] = Carbon::now();

        Seo::create($data);

        $notification = array('message' => 'Seos added Successfully!', 'alert-type' => 'success');
        return redirect()->route('seos')->with($notification);
    } // End Method

    public function Seos_Update(Request $request)
    {
        $update_id = $request->id;

        $seo = Seo::find($update_id);
        $seo->update($request->only([
            'meta_author',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'google_analytics',
            'google_verification',
            'alexa_analytics',
        ]));

        $notification = array('message' => 'Seos Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('seos')->with($notification);
    } // End Method
    //// ================== Seos Function End =====================////


    //// ================== Website Settings Function Start =====================////

    public function Website_Settings()
    {
        $website_setting = WebsiteSetting::first();
        if ($website_setting) {
            return view('backend.setting.website_setting.update', compact('website_setting'));
        } else {
            return view('backend.setting.website_setting.insert_data', compact('website_setting'));
        }
    } // End Method

    public function Website_Settings_Data_Insert(Request $request)
    {
        $request->validate([
            "website_name" => "required",
        ]);

        $data = $request->only([
            'website_name',
            'phone_one',
            'phone_two',
            'main_email',
            'support_email',
            'address',
            'description',
            'job_title',
        ]);
        $data['created_at'] = Carbon::now();

        if ($request->hasFile('favicon')) {
            $img_name = uniqid() . '.' . $request->favicon->getClientOriginalExtension();
            Image::make($request->favicon)->resize(64, 64)->save('backend/image/website_settings/' . $img_name);
            $data['favicon'] = 'backend/image/website_settings/' . $img_name;
        }

        if ($request->hasFile('profile_image')) {
            $img_name = uniqid() . '.' . $request->profile_image->getClientOriginalExtension();
            Image::make($request->profile_image)->resize(64, 64)->save('backend/image/website_settings/' . $img_name);
            $data['profile_image'] = 'backend/image/website_settings/' . $img_name;
        }

        WebsiteSetting::create($data);

        $notification = array('message' => 'Website Settings Added Successfully!', 'alert-type' => 'success');
        return redirect()->route('website_settings')->with($notification);
    } // End Method

    public function Website_Settings_Data_Update(Request $request)
    {
        $update_id = $request->id;

        $website_setting = WebsiteSetting::find($update_id);
        $data = $request->only([
            'website_name',
            'phone_one',
            'phone_two',
            'main_email',
            'support_email',
            'address',
            'description',
            'job_title',
        ]);
        $data['updated_at'] = Carbon::now();

        if ($request->hasFile('favicon')) {
            if ($website_setting->favicon) {
                unlink($website_setting->favicon);
            }

            $img_name = uniqid() . '.' . $request->favicon->getClientOriginalExtension();
            Image::make($request->favicon)->save('backend/image/website_settings/' . $img_name);
            $data['favicon'] = 'backend/image/website_settings/' . $img_name;
        }

        if ($request->hasFile('profile_image')) {
            if ($website_setting->profile_image) {
                unlink($website_setting->profile_image);
            }

            $img_name = uniqid() . '.' . $request->profile_image->getClientOriginalExtension();
            Image::make($request->profile_image)->save('backend/image/website_settings/' . $img_name);
            $data['profile_image'] = 'backend/image/website_settings/' . $img_name;
        }

        $website_setting->update($data);

        $notification = array('message' => 'Website Settings Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('website_settings')->with($notification);
    } // End Method
}
