<?php

namespace App\Http;

use App\Http\Controllers\Controller;
use App\Models\Form;

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

    public function formList()
    {
        return view('application.form.list');
    }

    public function viewForm($slug)
    {
        $data = Form::query()->with(['sections','sections.contents', 'sections.contents.options'])->where('slug',$slug )->first();
        return view('application.form.form_view', ['data_form' => $data]);
    }
}
