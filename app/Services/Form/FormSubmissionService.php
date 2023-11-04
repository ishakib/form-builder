<?php


namespace App\Services\Form;

use App\Models\Content;
use App\Models\Form;
use App\Models\InputField;
use App\Models\Option;
use App\Models\Submission;
use App\Services\BaseService;

class FormSubmissionService extends BaseService
{
    public function __construct(Submission $form)
    {
        $this->model = $form;
    }
}
