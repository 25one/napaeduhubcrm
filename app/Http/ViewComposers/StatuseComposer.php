<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Statuse;

class StatuseComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('statuses', Statuse::select('id', 'name')->get());
    }
}
