<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owners;
use App\Models\Buildings;

class Notices extends Model
{
    use HasFactory;
    protected $table = 'tble_notices';

    public function Owners(){
        return $this-> belongsTo(Owners::class,'owner_Id','id');
    }

    public function Buildings(){
        return $this-> belongsTo(Buildings::class,'building_Id','building_Id');
    }
}
