<?php

namespace App\Http;

use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    public function formCreate()
    {
        return view('application.form.form_create');
    }
    public function formSubmit()
    {
        return view('application.form.form_submit');
    }
}
