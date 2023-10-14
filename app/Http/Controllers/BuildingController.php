<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildings;
use App\Models\Owners;
use App\Models\Flats;
use App\Helpers\Helper;

class BuildingController extends Controller
{
    public function GetBuildingList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Buildings::get();
        return view('table-building',compact('data'));
    }
    public function GetBuildingForm()
    {
        $dataOwners = Owners::get();
        return view('create-building',compact('dataOwners'));
    }

    public function CreateBuilding(Request $request)
    {
       $building = new Buildings();

       $building->name = $request->name;
       $building->address = $request->address;
       $building->developer = $request->developer;
       $building->owner_Id = $request->owner_Id;

       $building->building_Id = Helper::Generator(new Buildings,'building_Id',4,'Building#');
       $building->date = $request->date;




       $res = $building->save();
       return redirect()->route('building.table');
    }
    public function AddFlat(Request $request)
    {
        $flat = new Flats();

        $flat->unit_name = $request->unit_name;
        $flat->owner_Id = $request->owner_Id;
        $flat->flat_Id = Helper::Generator(new Flats,'flat_Id',4,'Flat#');

        $res = $flat->save();
        return redirect()->route('building.form.create');

    }

    public function GetBuildingUpdateForm(Request $request)
    {
        $data = Buildings::find($request->id);
        $dataOwners = Owners::get();


        return view('update-building', compact('data','dataOwners'));
    }

    public function UpdateBuilding(Request $request,$id)
    {
       $data = Buildings::find($id);
       $data->owner_Id = $request->input("owner_Id");
       $data->name = $request->input("name");
       $data->address = $request->input("address");
       $data->developer = $request->input("developer");
       $data->date = $request->input("date");





       $data->update();

       return redirect()->route('building.table');
    }


    public function DeleteBuilding($id)
    {
        $data = Buildings::find($id);
        $data->delete();


        return redirect()->route('building.table');
    }
}
