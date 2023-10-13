<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Buildings;
use App\Models\Owns;
use App\Models\Flats;

class OwnController extends Controller
{
    public function GetOwnList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Owns::get();
        return view('table-own',compact('data'));
    }
    public function GetOwnForm()
    {
        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();
        $dataFlats = Flats::get();
        return view('create-own',compact('dataOwners', 'dataFlats','dataBuildings'));
    }

    public function CreateOwn(Request $request)
    {
       $own = new Owns();

       $own->owner_Id = $request->owner_Id;
       $own->flat_Id = $request->flat_Id;
       $own->building_Id = $request->building_Id;


       $res = $own->save();
       return redirect()->route('own.table');
    }

    public function GetOwnUpdateForm(Request $request)
    {
        $data = Owns::find($request->id);
        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();
        $dataFlats = Flats::get();

        return view('update-own', compact('data', 'dataFlats','dataOwners','dataBuildings'));
    }

    public function UpdateOwn(Request $request,$id)
    {
        $data = Owns::find($id);

       $data->owner_Id = $request->input("owner_Id");
       $data->flat_Id = $request->input("flat_Id");
       $data->building_Id = $request->input("building_Id");


       $data->update();

       return redirect()->route('own.table');
    }


    public function DeleteOwn($id)
    {
        $data = Owns::find($id);
        $data->delete();


        return redirect()->route('own.table');
    }
}
