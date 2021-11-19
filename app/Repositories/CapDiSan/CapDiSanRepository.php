<?php
namespace App\Repositories\CapDiSan;

use App\Repositories\BaseRepository;

class CapDiSanRepository extends BaseRepository implements CapDiSanRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\CapDiSan::class;
    }
    

}