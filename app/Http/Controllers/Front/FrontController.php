<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\ {
    Http\Controllers\Controller,
    Repositories\FrontRepository,
    Http\Controllers\Traits\Indexable    

};


class FrontController extends Controller
{
    use Indexable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FrontRepository $repository)    
    {
        $this->repository = $repository;
        $this->namespace = 'front';
    }
   
}
