<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait Indexable
{
    /**
     * The Repository instance.
     *
     * @var \App\Repositories\CardRepository
     * @var ...     
     */
    protected $repository;

    /**
     * The namespace
     *
     * @var string
     */
    protected $namespace; 

    /**
     * The page
     *
     * @var string
     */
    protected $page; 

    /**
     * The pagination number.
     *
     * @var int
     */
    //protected $nbrPages;

    /**
     * Display home-view
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view($this->namespace . '.grant', ['seo' => $this->getParameters()]);
        $this->page = 'home';
        return view($this->namespace . '.home', ['seo' => $this->getParameters()]);
    }

    /**
     * Display about-view
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
       $this->page = 'about'; 
       return view($this->namespace . '.about', ['seo' => $this->getParameters()]);
    }

    /**
     * Display courses-view
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
       $this->page = 'courses'; 
       return view($this->namespace . '.courses', ['seo' => $this->getParameters()]);
    }

    /**
     * Display contacts-view
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function contacts()
    {
       $this->page = 'contacts'; 
       return view($this->namespace . '.contacts', ['seo' => $this->getParameters()]);
    }    

    /**
     * Get parameters.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function getParameters()
    {
        // Default parameters
        $parameters = config("parameters." . $this->namespace . '.seo.' . $this->page);

        return $parameters;
    }    

}