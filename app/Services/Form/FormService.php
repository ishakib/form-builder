<?php


namespace App\Services\Form;

use App\Models\Content;
use App\Models\Form;
use App\Models\InputField;
use App\Models\Option;
use App\Services\BaseService;

class FormService extends BaseService
{
    protected $inputFields = [];
    public function __construct(Form $form)
    {
        $this->model = $form;

    }

    public function save($options = [])
    {
        $attributes = count($options) ? $options : request()->all();

        $this->model
            ->fill($this->getFillAble($attributes))
            ->save();

        return $this;
    }

    public function saveManySections()
    {
        $this->inputFields = collect(InputField::query()->get());
        $sectionsData = request()->sections ?? [];

        foreach ($sectionsData as $sectionData) {
            $section = $this->createSection($sectionData);
            $this->createAndSaveContents($section, $sectionData['content']);
        }

        return $this;
    }

    protected function createSection($sectionData)
    {
        return $this->model->sections()->create([
            'title' => $sectionData['title'],
            'editing_title' => $sectionData['editing_title'],
        ]);
    }

    protected function createAndSaveContents($section, $contentData)
    {
        foreach ($contentData as $contentItem) {
            $content = $this->createContent($contentItem);
            $section = $section->contents()->save($content);

            if (in_array($contentItem['type'], ['checkbox', 'multiple_choice']) && isset($contentItem['options'])) {
                $this->createAndSaveOptions($content, $contentItem['options']);
            }
        }
    }

    protected function createContent($contentItem): Content
    {
        return new Content([
            'type' => $contentItem['type'],
            'label' => $contentItem['label'],
            'input_field_id' => $this->inputFields->where('name', $contentItem['type'])->first()->id ?? null,
        ]);
    }

    protected function createAndSaveOptions($content, $optionsData)
    {
        foreach ($optionsData as $optionData) {
            $option = new Option([
                'content_id' => $content->id,
                'label' => $optionData['label'],
                'value' => $optionData['value'],
                'checked' => $optionData['checked'],
            ]);
            $content->options()->save($option);
        }
    }
}
