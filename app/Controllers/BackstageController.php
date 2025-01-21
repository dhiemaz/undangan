<?php
namespace App\Controllers;

class BackStageController extends BaseController
{
    public function index()
    {
        return view('backstage/login'); // Load the login form view
    }

    public function dashboard()
    {
        return view('backstage/dashboard'); // Load the login form view
    }
}