<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Test;

class TestComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tests', Test::select('id', 'name')->get());
    }
}
