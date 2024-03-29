<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CapDiSan\CapDiSanRepositoryInterface;
use App\Models\CapDiSan;
use App\Models\DiSan;

class CapDiSanController extends Controller
{
     /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $capdisanRepo;

    public function __construct(CapDiSanRepositoryInterface $capdisanRepo)
    {
        $this->capdisanRepo = $capdisanRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capdisan = $this->capdisanRepo->getAll();
        return response()->json($capdisan, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $capdisan = $this->capdisanRepo->create($data);
        return response()->json($capdisan, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capdisan = $this->capdisanRepo->find($id);
        return response()->json($capdisan, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $capdisan = $this->capdisanRepo->update($id, $data);
        return response()->json($capdisan, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->capdisanRepo->delete($id);
        return response()->json(null, 201);
    }
    public function getDetails($id){
        return DiSan::where('cap_id', $id)->get();
       
    }
}
