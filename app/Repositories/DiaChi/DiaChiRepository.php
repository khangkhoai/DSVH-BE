<?php
namespace App\Repositories\DiaChi;

use App\Repositories\BaseRepository;

class DiaChiRepository extends BaseRepository implements DiaChiRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\DiaChi::class;
    }
    

}