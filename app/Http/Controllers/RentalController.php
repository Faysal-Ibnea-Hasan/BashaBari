<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;
use App\Models\Flats;
use App\Helpers\Helper;

class RentalController extends Controller
{



    public function GetRentalList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Rentals::get();
        return view('table-rental',compact('data'));
    }
    public function GetRentalForm()
    {

        $dataFlats = Flats::get();
        return view('create-rental',compact('dataFlats'));
    }

    public function CreateRental(Request $request)
    {
       $rental = new Rentals();

       $rental->flat_Id = $request->flat_Id;
       $rental->rental_Id = Helper::Generator(new Flats,'rental_Id',4,'Rental');
       $rental->status = $request->status;


       $res = $rental->save();
       return redirect()->route('rental.table');
    }

    public function GetRentalUpdateForm(Request $request)
    {
        $data = Rentals::find($request->id);

        $dataFlats = Flats::get();

        return view('update-rental', compact('data', 'dataFlats'));
    }

    public function UpdateRental(Request $request,$id)
    {
        $data = Rentals::find($id);


       $data->flat_Id = $request->input("flat_Id");
       $data->status = $request->input("status");


       $data->update();

       return redirect()->route('rental.table');
    }


    public function DeleteRental($id)
    {
        $data = Rentals::find($id);
        $data->delete();


        return redirect()->route('rental.table');
    }
}


