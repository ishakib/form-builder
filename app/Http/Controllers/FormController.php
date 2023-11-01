<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomFieldRequest;
use App\Http\Requests\SubmitedFromRequest;
use App\Models\CustomField;
use App\Models\Form;
use App\Services\Form\CustomFieldService;
use App\Services\Form\FormService;

class FormController extends Controller
{

    public function __construct(FormService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->service
            ->orderBy('id', 'DESC')
            ->paginate(request('per_page', 15));
    }

    /**
     * @param SubmitedFromRequest $request
     * @return array
     */
    public function store(SubmitedFromRequest $request)
    {
        dd("called", $request->all());
        $this->service->save($request->only('name', 'editing_title'));
        return created_responses('form');
    }


    public function show(Form $form)
    {
        return $form->load('form');
    }

    public function update(Form $form, SubmitedFromRequest $request)
    {
        $form->update($request->only('name', 'editing_title'));
        return updated_responses('form');
    }

    public function destroy(Form $form)
    {
        if ($form->delete()) {
            return deleted_responses('form');
        }
        return failed_responses();
    }
}
