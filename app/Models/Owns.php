<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owners;
use App\Models\Buildings;
use App\Models\Flats;

class Owns extends Model
{
    use HasFactory;
    protected $table = 'tbl_owns';

    public function Owners(){
        return $this-> belongsTo(Owners::class,'owner_Id','id');
    }
    public function Flats(){
        return $this-> belongsTo(Flats::class,'flat_Id','id');
    }
    public function Buildings(){
        return $this-> belongsTo(Buildings::class,'building_Id','id');
    }
}
