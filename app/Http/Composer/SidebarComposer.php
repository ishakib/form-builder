<?php

namespace App\Http\Composer;

use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $view->with(['data' => [
            [
                'icon' => 'pie-chart',
                'name' => 'Dashboard',
                'url' => request()->root() . '/admin/dashboard',
                'permission' => true,
            ],
            [
                'icon' => 'pie-chart',
                'name' => 'Calte',
                'url' => request()->root() . '/admin/dashboard',
                'permission' => true,
            ],
        ]]);
    }
}
