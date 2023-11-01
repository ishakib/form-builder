<?php


namespace App\Services\Form;

use App\Models\CustomField;
use App\Models\Form;
use App\Services\BaseService;

class FormService extends BaseService
{
    public function __construct(Form $form)
    {
        $this->model = $form;
    }
}
