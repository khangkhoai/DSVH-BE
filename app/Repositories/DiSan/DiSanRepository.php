<?php
namespace App\Repositories\DiSan;

use App\Repositories\BaseRepository;

class DiSanRepository extends BaseRepository implements DiSanRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\DiSan::class;
    }
    // public function find($id){
    //     $product = $this->getModel()::with('category')->find($id);
    //     return $product;
    // }
    // public function get(){
    //     $product = $this->getModel()::paginate(6);
    //     return $product;
    // }

}