<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DiaChi\DiaChiRepositoryInterface;

class DiaChiController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $diachiRepo;

    public function __construct(DiaChiRepositoryInterface $diachiRepo)
    {
        $this->diachiRepo = $diachiRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diachi = $this->diachiRepo->getAll();
        return response()->json($diachi, 201);
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
        $diachi = $this->diachiRepo->create($data);
        return response()->json($diachi, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diachi = $this->diachiRepo->find($id);
        return response()->json($diachi, 201);
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
        $diachi = $this->diachiRepo->update($id, $data);
        return response()->json($diachi, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->diachiRepo->delete($id);
        return response()->json(null, 201);
    }
}
