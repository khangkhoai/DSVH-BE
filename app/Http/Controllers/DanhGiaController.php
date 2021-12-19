<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Illuminate\Http\Request;
use App\Repositories\DanhGia\DanhGiaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
     /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $danhgiaRepo;

    public function __construct(DanhGiaRepositoryInterface $danhgiaRepo)
    {
        $this->danhgiaRepo = $danhgiaRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhgia = $this->danhgiaRepo->getAll();
        return response()->json($danhgia, 201);
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
        $danhgia = $this->danhgiaRepo->create($data);
        return response()->json($danhgia, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danhgia = $this->danhgiaRepo->find($id);
        return response()->json($danhgia, 201);
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
        $danhgia = $this->danhgiaRepo->update($id, $data);
        return response()->json($danhgia, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->danhgiaRepo->delete($id);
        return response()->json(null, 201);
    }
    public function vote($id)
    {
         return DB::table('danh_gias')->join('di_sans', 'disan_id', '=', 'di_sans.id')->where('danh_gias.disan_id', '=',  $id )->select('danh_gias.ten', 'danhgia', 'binhluan', 'danh_gias.created_at')->get();
    }
    public function stat()
    {
        return DB::table('danh_gias')->join('di_sans', 'disan_id', '=', 'di_sans.id')->groupBy('di_sans.ten','luotxem')->select( 'di_sans.ten','luotxem')->selectRaw('avg(danhgia) as trungbinh')->get();
    }
}
