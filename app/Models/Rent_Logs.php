<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenants;
use App\Models\Flats;
use App\Models\Owners;
use App\Models\Buildings;

class Rent_Logs extends Model
{
    use HasFactory;
    protected $table = 'tbl_rent_logs';

    public function Tenants(){
        return $this->belongsTo(Tenants::class,'tenant_Id','tenant_Id');
    }
    public function Flats(){
        return $this->belongsTo(Flats::class,'flat_Id','flat_Id');
    }
    public function Owners(){
        return $this->belongsTo(Owners::class,'owner_Id','id');
    }
    public function Buildings(){
        return $this->belongsTo(Buildings::class,'building_Id','building_Id');
    }
}
