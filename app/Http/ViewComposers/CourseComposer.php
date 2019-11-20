<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Course;

class CourseComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('courses', Course::select('id', 'name')->get());
    }
}
