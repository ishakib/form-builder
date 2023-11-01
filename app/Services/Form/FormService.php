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

    public function saveCustomField()
    {
        // Loop through the content data (custom fields) and create associated custom fields
        foreach (request()->input('content') as $customFieldData) {
            $this->model->customFields()->create([
                'name' => $customFieldData['label'],
                'context' => $customFieldData['type'],
            ]);
        }
        return $this;
    }
}
