<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owners;
use App\Models\Problems;
use App\Models\Flats;

class Buildings extends Model
{
    use HasFactory;
    protected $table = 'tbl_buildings';

    public function Owners(){
        return $this->belongsTo(Owners::class,'owner_Id','id');
    }
    public function Problems(){
        return $this->hasMany(Problems::class,'building_Id','building_Id');
    }
    public function Flats(){
        return $this->hasMany(Flats::class,'building_Id','building_Id');
    }
}
