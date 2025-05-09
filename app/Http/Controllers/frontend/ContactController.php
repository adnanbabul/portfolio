<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ContactController extends Controller
{
    //

    private $db_contacts;

    public function __construct()
    {
        $this->db_contacts = "contacts";
    } // End Method


    // Contact Nav Bar Function
    public function Contact()
    {
        return view('_frontend.contact.contact');
    } // End Method

    // Contact Message Send Function
    public function Contact_Send(Request $request)
    {

        $validate = $request->validate([
            "name" => "required",
            "email" => "required",
            // "subject" => "required",
        ], [
            "name.required" => "This Name is Required",
            "email.required" => "This Email is Required",
            // "subject.required" => "This Subject is Required",
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_contacts)->insert($data);

        $notification = array('message' => 'Message Send Successfully!', 'alert-type' => 'success');
        return redirect()->back();
    } // End Method
}
