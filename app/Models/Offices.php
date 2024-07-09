<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owners;

class Offices extends Model
{
    use HasFactory;
    protected $table = 'tbl_offices';
    
    public function Owners(){
        return $this->belongsTo(Owners::class,'owner_Id','id');
    }
}
