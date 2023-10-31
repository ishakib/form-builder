<?php

namespace App\Http\Composer;

use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        //$table = CustomTable::all();

        $menu = [];


        $view->with(['data' => $menu]);
    }
}
