<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buildings;

class Flats extends Model
{
    use HasFactory;
    protected $table = 'tbl_flats';

    public function Buildings(){
        return $this->belongsTo(Buildings::class,'building_Id','building_Id');
    }
}
