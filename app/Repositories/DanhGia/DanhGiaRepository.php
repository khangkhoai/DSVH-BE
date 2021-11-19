<?php
namespace App\Repositories\DanhGia;

use App\Repositories\BaseRepository;

class DanhGiaRepository extends BaseRepository implements DanhGiaRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\DanhGia::class;
    }
    

}