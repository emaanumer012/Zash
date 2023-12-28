<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\View\View;

class InformationController extends Controller
{
    /**
     * Display information about the company (About Us).
     *
     * @return \Illuminate\View\View
     */
    public function aboutus(): View
    {
        // Retrieve information with the specified 'ABOUT US' specialization from the database
        $data = Information::where('spec', 'ABOUT US')->get();

        // Render the Aboutus view and pass the information data
        return view("Aboutus", ["infos" => $data]);
    }

    /**
     * Display contact information for the company (Contact Us).
     *
     * @return \Illuminate\View\View
     */
    public function contactus(): View
    {
        // Retrieve information with the specified 'CONTACT US' specialization from the database
        $data = Information::where('spec', 'CONTACT US')->get();

        // Render the ContactUs view and pass the information data
        return view("contactUs", ["infos" => $data]);
    }
}
