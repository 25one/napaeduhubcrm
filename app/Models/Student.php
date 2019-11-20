<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
         'name', 'contacts', 'test_id', 'statuse_id', 'course_id', 'datelesson', 'timeteacherlesson', 'note'
    ];

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function statuse()
    {
        return $this->belongsTo(Statuse::class);
    }    

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Getter for view date
     *
     * @return string
     */
    public function getDatelessonAttribute($value)
    {
        if($value == '0000-00-00') {
           return '';
        }
        else {
           return $value;    
        }
    }    

}
