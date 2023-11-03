<?php


namespace App\Services\Form;

use App\Models\Form;
use App\Services\BaseService;

class FormService extends BaseService
{
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

    public function saveManySections(): static
    {
        $sections = [];

        foreach (request()->sections as $sectionData) {
            $section = $this->createSection($sectionData);
            $sections[] = $section;
        }

        $this->saveSections($sections);

        return $this;
    }

    protected function createSection($sectionData): Section
    {
        return $this->model->sections()->create([
            'title' => $sectionData['title'],
            'editing_title' => $sectionData['editingTitle'],
        ]);
    }

    protected function saveSections($sections)
    {
        $this->model->sections()->saveMany($sections);
    }

}
