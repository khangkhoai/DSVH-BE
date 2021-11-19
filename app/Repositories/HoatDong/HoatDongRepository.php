<?php
namespace App\Repositories\HoatDong;

use App\Repositories\BaseRepository;

class HoatDongRepository extends BaseRepository implements HoatDongRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\HoatDong::class;
    }
    

}