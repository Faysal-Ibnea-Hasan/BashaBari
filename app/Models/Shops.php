<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owners;

class Shops extends Model
{
    use HasFactory;
    protected $table = 'tbl_shops';
    
    public function Owners(){
        return $this->belongsTo(Owners::class,'owner_Id','id');
    }
}
