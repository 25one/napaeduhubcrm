<?php

namespace App\Repositories;

use App\Models\ {
    Student
};

class AdminRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new AdminRepository instance.
     *
     * @param  \App\Models\Student $student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function getData($request, $nbrPages)
    {
         $query = $this->model
            ->select('id', 'name', 'contacts', 'test_id', 'statuse_id', 'course_id', 'datelesson', 'timeteacherlesson', 'note')
            ->orderBy('course_id', 'asc');

            if($request['statuse']) {$query->where('statuse_id', '=', $request['statuse']);}
            if($request['course']) {$query->where('course_id', '=', $request['course']);}  

            if($request['searching']) {$query->where('name', 'like', '%' . $request['searching'] . '%');}
            return $query->paginate($nbrPages);
    }

    /**
     * Store post.
     *
     * @param  \App\Http\Requests\StudentRequest $request
     * @return void
     */
    public function store($request)
    {
        $card = Student::create($request->all());
    }  

    /**
     * Update student.
     *
     * @param  \App\Models\Student $student
     * @return void
     */
    public function update($request, $student)
    {
        $student->update($request->all());
        /*
        $card->user_id = $request->user_id;
        $card->card_id = $request->card_id;
        $card->number = $request->number;
        $card->save();
        */
    }      

}

