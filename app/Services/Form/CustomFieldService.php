<?php


namespace App\Services\Form;

use App\Models\CustomField;
use App\Services\BaseService;

class CustomFieldService extends BaseService
{
    public function __construct(CustomField $field)
    {
        $this->model = $field;
    }
}
