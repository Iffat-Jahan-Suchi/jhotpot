<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutInformationController extends Controller
{
    public function aboutUs()
    {
       return view('front.about.about-us');
    }
    public function deliveryInfo()
    {
        return view('front.about.delivery-info');
    }
    public function privacyPolicy()
    {
        return view('front.about.privacy-policy');
    }
}
