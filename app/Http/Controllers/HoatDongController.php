<?php

namespace App\Http\Controllers;

use App\Models\HoatDong;
use Illuminate\Http\Request;
use App\Repositories\HoatDong\HoatDongRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        return DB::table('hoat_dongs')->join('di_sans', 'disan_id', '=', 'di_sans.id')->select('hoat_dongs.*','di_sans.ten as tendisan')->get();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return HoatDong::orderBy('created_at' , 'desc' )->limit(3)->get();
        return HoatDong::orderBy('created_at' , 'desc' )->limit(1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $name = time() . $file->getClientOriginalName();
            $file_path1 = $request->file('anh')->move('uploads/activity', $name);
            $path_name1 = $file_path1->getPathname();
        }
        $data = [
            'ten' => $request->ten,
            'mota' => $request->mota,
            'batdau' => $request->batdau,
            'ketthuc' => $request->ketthuc,
            'diadiem' => $request->diadiem,
            'disan_id' => $request->disan_id,
            'anh' => $path_name1 ?? '',
            
        ];
        return  $this->hoatdongRepo->create($data);
       
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
    public function updateHoatDong(HoatDong $hoatdong ,Request $request)
    {
        $data = [
            'ten' => $request->ten,
            'mota' => $request->mota,
            'batdau' => $request->batdau,
            'ketthuc' => $request->ketthuc,
            'diadiem' => $request->diadiem,
            'disan_id' => $request->disan_id,
            'anh' => $path_name1 ?? '',
            
        ];
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $name = time() . $file->getClientOriginalName();
            $file_path1 = $request->file('anh')->move('uploads/activity', $name);
            $path_name1 = $file_path1->getPathname();
        }
        else{
            $path_name1 = $this->hoatdongRepo->find($hoatdong->id)->anh;
        }
        $data['anh'] = $path_name1;
        return $hoatdong->update($data);
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(){
        return HoatDong::orderBy('created_at' , 'desc' )->limit(1)->get();
    }
    public function newest(){
        $time = Carbon::now();
        return HoatDong::where('batdau' , '<', $time )->where('ketthuc' , '>', $time )->get();
    }
    public function show1($id){
        return DB::table('hoat_dongs')->join('di_sans', 'disan_id', '=', 'di_sans.id')->where('hoat_dongs.id', '=',  $id )->select('hoat_dongs.*','di_sans.ten as tendisan')->get();
    }
    public function search2(Request $request)
    {
        $ten = $request->ten;
        $time1 = $request->time1;
        $time2 = $request->time2 ;   
        return HoatDong::where('batdau' , '>', $time1 )->where('ketthuc' , '<', $time2 )->where('ten', 'LIKE', '%'  . $ten . '%')->get();
       
    }
}
