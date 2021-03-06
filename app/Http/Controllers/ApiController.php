<?php

namespace App\Http\Controllers;

use App\Library\Contracts\ApiServiceInterface;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @var ApiServiceInterface
     */
    protected $peopleService;

    /**
     * PeopleController constructor.
     * @param ApiServiceInterface $service
     */
    public function __construct(ApiServiceInterface $service)
    {
        $this->peopleService = $service;
    }

    /**
     * Display a listing of the resource.
     * @param int $page
     * @return mixed
     */
    public function index(int $page = 1)
    {
        return $this->peopleService->getAll($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        //
    }

    /**
     *  Display the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->peopleService->get($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
