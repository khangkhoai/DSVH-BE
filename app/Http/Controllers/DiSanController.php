<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiSan;
use App\Repositories\DiSan\DiSanRepositoryInterface;
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
        $disan = $this->disanRepo->getAll();
        return response()->json($disan, 201);
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
            'diadiem' => $request->diadiem,
            'xa' => $request->huyen,
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
        // if ($request->hasFile('anh')) {
        //     $file = $request->anh;
        //     $name = time() . $file->getClientOriginalName();
        //     $file_path1 = $request->file('anh')->move('uploads/photo', $name);
        //     $path_name1 = $file_path1->getPathname();
        // }
        // if ($request->hasFile('video')) {
        //     $file = $request->video;
        //     $name = time() . $file->getClientOriginalName();
        //     $file_path2 = $request->file('video')->move('uploads/video', $name);
        //     $path_name2 = $file_path2->getPathname();
        // }
        // if ($request->hasFile('audio')) {
        //     $file = $request->audio;
        //     $name = time() . $file->getClientOriginalName();
        //     $file_path3 = $request->file('audio')->move('uploads/audio', $name);
        //     $path_name3 = $file_path3->getPathname();
        // }
        $data = [
            'ten' => $request->ten,
            'mota' => $request->mota,
            'luotxem' => $request->luotxem,
            'loai_id' => $request->loai_id,
            'cap_id' => $request->cap_id,
            'diadiem' => $request->diadiem,
            'xa' => $request->huyen,
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
 
}
