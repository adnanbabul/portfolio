<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Testimonial;
use DateTime;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function Home_Page()
    {
        $site_settings = DB::table('website_settings')->first();
        $socials = DB::table('socials')->first();
        $skills = DB::table('progress_bar')->where('status', 1)->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_date', 'desc')->get();
        $about = About::orderBy('id', 'desc')->first();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();

        $total_experience_months = 0;

        foreach ($experiences as $exp) {
            $start_date = DateTime::createFromFormat('Y-m', $exp['start_date']);
            $end_date = $exp['end_date'] ? DateTime::createFromFormat('Y-m', $exp['end_date']) : new DateTime();

            $interval = $start_date->diff($end_date);
            $duration_months = $interval->y * 12 + $interval->m;
            $total_experience_months += $duration_months;
        }

        $total_experience_years = intval($total_experience_months / 12);

        return view('frontend.layouts.master', compact('site_settings', 'socials', 'skills', 'educations', 'experiences', 'about', 'testimonials', 'total_experience_years'));
    }
}
