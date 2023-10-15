<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenants;
use App\Models\Rents;
use App\Models\Flats;
use App\Models\Owners;
use App\Models\Buildings;

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
        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();


        return view('create-rent',compact('dataTenants', 'dataFlats', 'dataOwners', 'dataBuildings'));
    }

    public function CreateRent(Request $request)
    {
       $rent = new Rents();

       $rent->tenant_Id = $request->tenant_Id;
       $rent->flat_Id = $request->flat_Id;
       $rent->owner_Id = $request->owner_Id;
       $rent->building_Id = $request->building_Id;


       $res = $rent->save();
       return redirect()->route('rent.table');
    }

    public function GetRentUpdateForm(Request $request)
    {
        $data = Rents::find($request->id);
        $dataTenants = Tenants::get();
        $dataFlats = Flats::get();
        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();

        return view('update-rent', compact('data', 'dataFlats','dataTenants','dataBuildings','dataOwners'));
    }

    public function UpdateRent(Request $request,$id)
    {
       $data = Rents::find($id);

       $data->tenant_Id = $request->input("tenant_Id");
       $data->flat_Id = $request->input("flat_Id");
       $data->owner_Id = $request->input("owner_Id");
       $data->building_Id = $request->input("building_Id");


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
