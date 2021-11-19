<?php
namespace App\Repositories\LoaiDiSan;

use App\Repositories\BaseRepository;

class LoaiDiSanRepository extends BaseRepository implements LoaiDiSanRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\LoaiDiSan::class;
    }
    

}