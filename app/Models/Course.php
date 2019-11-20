<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    public $timestamps = false;

    /**
     * One to Many !right relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function student()
    {
        return $this->hasMany(Student::class); 
    }

}
