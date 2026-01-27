<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('pages.about-us');
    }

    /**
     * Show the services page.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        return view('pages.services');
    }

    /**
     * Show the products page.
     *
     * @return \Illuminate\View\View
     */
    public function products() {
        return view('pages.products');
    }

    /**
     * Show the tips page.
     *
     * @return \Illuminate\View\View
     */
    public function tips() {
        return view('pages.tips');
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact() {
        return view('pages.contact');
    }
}
