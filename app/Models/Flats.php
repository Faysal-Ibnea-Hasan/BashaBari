<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buildings;
use App\Models\Owners;

class Flats extends Model
{
    use HasFactory;
    protected $table = 'tbl_flats';

    public function Buildings(){
        return $this->belongsTo(Buildings::class,'building_Id','building_Id');
    }
    public function Owners(){
        return $this->belongsTo(Owners::class,'owner_Id','id');
    }
}
