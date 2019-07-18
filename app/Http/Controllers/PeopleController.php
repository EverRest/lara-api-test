<?php

namespace App\Http\Controllers;

use App\Contracts\ApiServiceInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PeopleController extends Controller
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
    public function index(int $page = 1): Response
    {
        return $this->peopleService->getAll('people', $page);
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
    public function show($id): Response
    {
        return $this->peopleService->get('people',$id);
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
