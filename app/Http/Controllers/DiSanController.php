<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiSan;
use App\Repositories\DiSan\DiSanRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class DiSanController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $disanRepo;

    public function __construct(DiSanRepositoryInterface $disanRepo)
    {
        $this->disanRepo = $disanRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $disan = $this->disanRepo->getAll();
        // return response()->json($disan, 201);
        return DB::table('di_sans')->join('loai_di_sans', 'loai_id', '=', 'loai_di_sans.id')->join('cap_di_sans', 'cap_id', '=', 'cap_di_sans.id')->select('di_sans.*','tenloai' ,'tencap')->get();
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDiSan()
    {
        $disan = $this->disanRepo->getAll();
        return response()->json($disan, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return DiSan::orderBy('luotxem' , 'desc' )->limit(1)->get();
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
            $file_path1 = $request->file('anh')->move('uploads/photo', $name);
            $path_name1 = $file_path1->getPathname();
        }
        if ($request->hasFile('video')) {
            $file = $request->video;
            $name = time() . $file->getClientOriginalName();
            $file_path2 = $request->file('video')->move('uploads/video', $name);
            $path_name2 = $file_path2->getPathname();
        }
        if ($request->hasFile('audio')) {
            $file = $request->audio;
            $name = time() . $file->getClientOriginalName();
            $file_path3 = $request->file('audio')->move('uploads/audio', $name);
            $path_name3 = $file_path3->getPathname();
        }
        $data = [
            'ten' => $request->ten,
            'mota' => $request->mota,
            'luotxem' => $request->luotxem,
            'loai_id' => $request->loai_id,
            'cap_id' => $request->cap_id,
            
            'xa' => $request->xa,
            'huyen' => $request->huyen,
            'anh' => $path_name1 ?? '',
            'video' => $path_name2 ?? '',
            'audio' => $path_name3 ?? ''
        ];
        
        return  $this->disanRepo->create($data);
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $disan = $this->disanRepo->find($id);
        return response()->json($disan, 201);
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
    public function updateDiSan(DiSan $disan, Request $request)
    {
        
        $data = [
            'ten' => $request->ten,
            'mota' => $request->mota,
            'luotxem' => $request->luotxem,
            'loai_id' => $request->loai_id,
            'cap_id' => $request->cap_id,
            
            'xa' => $request->xa,
            'huyen' => $request->huyen,
            'anh' => $path_name1 ?? '',
            'video' => $path_name2 ?? '',
            'audio' => $path_name3 ?? ''
        ];
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $name = time() . $file->getClientOriginalName();
            $file_path1 = $request->file('anh')->move('uploads/photo', $name);
            $path_name1 = $file_path1->getPathname();
        }
        else{
            $path_name1 = $this->disanRepo->find($disan->id)->anh;
        }
        $data['anh'] = $path_name1;
        if ($request->hasFile('video')) {
            $file = $request->video;
            $name = time() . $file->getClientOriginalName();
            $file_path2 = $request->file('video')->move('uploads/video', $name);
            $path_name2 = $file_path2->getPathname();
        }
        else{
            $path_name2 = $this->disanRepo->find($disan->id)->video;
        }
        $data['video'] = $path_name2;
        if ($request->hasFile('audio')) {
            $file = $request->audio;
            $name = time() . $file->getClientOriginalName();
            $file_path3 = $request->file('audio')->move('uploads/audio', $name);
            $path_name3 = $file_path3->getPathname();
        }
        else{
            $path_name3 = $this->disanRepo->find($disan->id)->audio;
        }
        $data['audio'] = $path_name3;
        
        return $disan->update($data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->disanRepo->delete($id);
        return response()->json(null, 201);
    }
    /**
     * Show the product from name
     *
     * @param  int  $name
     * @return product
     */
    public function search($name)
    {
         return DiSan::where('ten', 'LIKE', '%'  . $name . '%')->orWhere('xa', 'LIKE', '%'  . $name . '%')->get();
    }
    public function search2(Request $request)
    {
       
         $name = $request->ten;
         $loai = $request->loai;
         $cap = $request->cap ;               
        if($cap == null && $loai == null){
            
            return DiSan::where('ten', 'LIKE', '%'  . $name . '%')->get();
        }
        elseif($cap == null){
            return DiSan::where('ten', 'LIKE', '%'  . $name . '%')->where('loai_id', '=', $loai)->get();
        }
        elseif($loai == null)
        {
            
            return DiSan::where('ten', 'LIKE', '%'  . $name . '%')->where('cap_id', '=', $cap)->get();
        }
        
        else{
        return DiSan::where('ten', 'LIKE', '%'  . $name . '%')->where('cap_id', '=', $cap)->where('loai_id', '=', $loai)->get();
        }
    }
    public function view()
    {
         return DiSan::orderBy('luotxem' , 'desc' )->limit(1)->get();
    }
    public function detail($id)
    {
        $postKey = 'detail_' . $id;

        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($postKey)) {
            DiSan::where('id', '=',$id)->increment('luotxem');
            Session::put($postKey, 1);
        }
        
         return DB::table('di_sans')->join('loai_di_sans', 'loai_id', '=', 'loai_di_sans.id')->join('cap_di_sans', 'cap_id', '=', 'cap_di_sans.id')->where('di_sans.id', '=',  $id )->select('*')->get();
    }

    public function showss(Request $request)
    {
         $all_data=$request->session()->all();
         return  $all_data;
    }
    
}
