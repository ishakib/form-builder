<?php

namespace App\Http;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\InputField;

class NavigationController extends Controller
{
    public function formCreate()
    {
        $input_fields = InputField::query()->select(['id','name'])->get()->toArray();
        return view('application.form.form_create', ['input_fields' => $input_fields]);
    }
    public function formSubmit()
    {
        return view('application.form.form_submit');
    }

    public function formList()
    {
        $list = Form::all();

        ;
        foreach ($list as $form) {
            $form->link = url('/'.$form->slug);
        }
        return view('application.form.list', ['list' =>$list]);
    }

    public function viewForm($slug)
    {
        $data = Form::query()->with(['sections','sections.contents', 'sections.contents.options'])->where('slug',$slug )->first();
        $input_fields = InputField::query()->select(['id','name'])->get()->toArray();
        return view('application.form.form_view', ['data_form' => $data, 'input_fields' =>$input_fields]);
    }
}
