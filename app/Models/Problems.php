<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buildings;
use App\Models\Flats;
use App\Models\Tenants;

class Problems extends Model
{
    use HasFactory;
    protected $table = 'tbl_problems';

    public function Buildings(){
        return $this-> belongsTo(Buildings::class,'building_Id','building_Id');
    }
    public function Flats(){
        return $this-> belongsTo(Flats::class,'flat_Id','flat_Id');
    }
    public function Tenants(){
        return $this-> belongsTo(Tenants::class,'tenant_Id','tenant_Id');
    }
}
