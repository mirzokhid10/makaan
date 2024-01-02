<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // index
    public function index() {
        return view('frontend.index');
    }

    // about
    public function about() {
        return view('frontend.about');
    }

    // contact
    public function contact() {
        return view('frontend.contact');
    }

    // propertylist
    public function propertylist() {
        return view('frontend.propertylist');
    }
}
