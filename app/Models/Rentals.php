<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flats;

class Rentals extends Model
{
    use HasFactory;
    protected $table = 'tbl_rentals';

    public function Flats(){
        return $this->belongsTo(Flats::class,'flat_Id','flat_Id');
    }
}
