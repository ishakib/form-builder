<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomFieldRequest;
use App\Models\CustomField;
use App\Services\Form\CustomFieldService;

class CustomFieldController extends Controller
{

    public function __construct(CustomFieldService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->service
            ->with('customFieldType:id,name', 'createdBy:id,first_name,last_name')
            ->orderBy('id', 'DESC')
            ->paginate(request('per_page', 15));
    }

    /**
     * @param CustomFieldRequest $request
     * @return array
     */
    public function store(CustomFieldRequest $request)
    {
        $this->service->save(
            array_merge(
                $request->only('name', 'context', 'meta', 'in_list', 'custom_field_type_id'),
                $request->has('tenant_id') ? $request->only('tenant_id') : []
            )
        );
        return created_responses('custom_field');
    }


    public function show(CustomField $customField)
    {
        return $customField->load('customFieldType');
    }

    public function update(CustomField $customField, CustomFieldRequest $request)
    {
        $customField->update(
            array_merge(
                $request->only('name', 'context', 'meta', 'in_list', 'custom_field_type_id'),
                $request->has('tenant_id') ? $request->only('tenant_id') : []
            )
        );
        return updated_responses('custom_field');
    }


    public function destroy(CustomField $customField)
    {
        if ($customField->delete()) {
            return deleted_responses('custom_field');
        }
        return failed_responses();
    }
}
