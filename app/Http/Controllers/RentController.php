<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenants;
use App\Models\Rents;
use App\Models\Flats;

class RentController extends Controller
{
    public function GetRentList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Rents::get();
        return view('table-rent',compact('data'));
    }
    public function GetRentForm()
    {
        $dataTenants = Tenants::get();
        $dataFlats = Flats::get();

        
        return view('create-rent',compact('dataTenants', 'dataFlats'));
    }

    public function CreateRent(Request $request)
    {
       $rent = new Rents();

       $rent->tenant_Id = $request->tenant_Id;
       $rent->flat_Id = $request->flat_Id;
       

       $res = $rent->save();
       return redirect()->route('rent.table');
    }
    
    public function GetRentUpdateForm(Request $request)
    {
        $data = Rents::find($request->id);
        $dataTenants = Tenants::get();
        $dataFlats = Flats::get();

        return view('update-rent', compact('data', 'dataFlats','dataTenants'));
    }

    public function UpdateRent(Request $request,$id)
    {
       $data = Rents::find($id);

       $data->tenant_Id = $request->input("tenant_Id");
       $data->flat_Id = $request->input("flat_Id");
       

       $data->update();

       return redirect()->route('rent.table');
    }


    public function DeleteRent($id)
    {
        $data = Rents::find($id);
        $data->delete();
        

        return redirect()->route('rent.table');
    }
}
