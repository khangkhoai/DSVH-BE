<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HoatDong\HoatDongRepositoryInterface;
class HoatDongController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $hoatdongRepo;

    public function __construct(HoatDongRepositoryInterface $hoatdongRepo)
    {
        $this->hoatdongRepo = $hoatdongRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoatdong = $this->hoatdongRepo->getAll();
        return response()->json($hoatdong, 201);
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
        $hoatdong = $this->hoatdongRepo->create($data);
        return response()->json($hoatdong, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoatdong = $this->hoatdongRepo->find($id);
        return response()->json($hoatdong, 201);
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
        $hoatdong = $this->hoatdongRepo->update($id, $data);
        return response()->json($hoatdong, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->hoatdongRepo->delete($id);
        return response()->json(null, 201);
    }
}
