<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Http\Requests\SubmittedFormRequest;
use App\Services\Form\FormService;
use App\Services\Form\FormSubmissionService;

class FormController extends Controller
{

    public function __construct(FormService $service, FormSubmissionService $formSubmissionService)
    {
        $this->service = $service;
        $this->formSubmissionService = $formSubmissionService;
    }

    public function store(SubmittedFormRequest $request)
    {
        $service = $this->service
            ->setAttributes($request->only('name', 'sections'))
            ->save($request->only('name'))
            ->saveManySections();

        return created_responses('form');
    }

    public function storeSubmission(SubmissionRequest $request)
    {

        $this->formSubmissionService
            ->setAttributes(array_merge($request->only('form_id'), [
                'data'=>json_encode($request->data),
                'user_id' => auth()->user()->id
            ]))
            ->save();
        return created_responses('form');
    }
}
