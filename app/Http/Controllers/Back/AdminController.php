<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Repositories\AdminRepository,
    Http\Requests\StudentRequest,
    Models\Student    

};

class AdminController extends Controller
{
    /**
     * The AdminRepository instance.
     *
     * @var \App\Repositories\AdminRepository
     */
    protected $repository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    {
        //$this->middleware('auth'); 
        $this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->repository = $repository;
        $this->nbrPages = config('app.nbrPages.back.students');
    }

    /**
     * Display a listing of the students with their courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$students = $this->repository->getData($request, $this->nbrPages);
        $students = $this->repository->getData($this->getParameters($request), $this->nbrPages);
        $links = $students->appends($this->getParameters($request))->links('back.pagination');  
        //$links = $students->links('back.pagination');        

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("back.brick-standard", ['students' => $students])->render(),
                'pagination' => $links->toHtml(),
            ]);
        } 

        return view('back.index', compact('students', 'links'));
    }

    /**
     * Get parameters.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function getParameters($request)
    {
        // Default parameters
        $parameters = config("parameters.back.filters");

        // Build parameters with request
        foreach ($parameters as $parameter => &$value) {
            if (isset($request->$parameter)) {
                $value = $request->$parameter;
            }
        }

        return $parameters;
        //print_r($parameters); die;
    }    

     /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.students.create');
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \App\Http\Requests\StudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $this->repository->store($request);

        return redirect(route('students.create'))->with('student-ok', __('The student has been successfully created'));
    }        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
       return view('back.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest $request
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        //$this->authorize('manage', $student);

        $this->repository->update($request, $student);

        return redirect(route('dashboard'))->with('student-updated', __('The student has been successfully updated'));
    }

    /**
     * Remove the card from storage.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //$this->authorize('manage', $student);

        $student->delete();

        return response()->json();
    }                

}

