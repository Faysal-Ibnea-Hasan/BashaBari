<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenants;
use App\Models\Flats;

class Rents extends Model
{
    use HasFactory;
    protected $table = 'tbl_rents';

    public function Tenants(){
        return $this->belongsTo(Tenants::class,'tenant_Id','id');
    }
    public function Flats(){
        return $this->belongsTo(Flats::class,'flat_Id','flat_Id');
    }
}
