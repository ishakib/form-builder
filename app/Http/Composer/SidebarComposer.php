<?php

namespace App\Http\Composer;

use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $view->with(['data' => [
            [
                'name' => 'Form Create',
                'url' => request()->root() . '/admin/form-create',
            ],
            [
                'name' => 'Form Submit',
                'url' => request()->root() . '/admin/form-submit',
            ],
        ]]);
    }
}
