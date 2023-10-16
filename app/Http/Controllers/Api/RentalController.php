<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Rentals;
use App\Models\Flats;
use App\Helpers\Helper;

class RentalController extends Controller
{



    public function GetRentalList($id=null)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = $id?Rentals::find($id):Rentals::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }


    public function CreateRental(Request $request)
    {
       $rental = new Rentals();

       $rental->flat_Id = $request->flat_Id;
       $rental->rental_Id = Helper::Generator(new Flats,'rental_Id',4,'Rental');
       $rental->status = $request->status;


       $res = $rental->save();

       return response()->json([
        'status' => true,
        'massage' => 'Rental created successfully',
        ]);
    }



    public function UpdateRental(Request $request,$id)
    {
        $data = Rentals::find($id);


       $data->flat_Id = $request->input("flat_Id");
       $data->status = $request->input("status");


       $data->update();

       return response()->json([
        'status' => true,
        'massage' => 'Rental updated successfully',
       ]);
    }


    public function DeleteRental($id)
    {
        $data = Rentals::find($id);
        $data->delete();


        return response()->json([
            'status' => true,
            'massage' => 'Rental deleted successfully',
        ]);
    }
}


