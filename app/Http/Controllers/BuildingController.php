<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildings;
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
        
        return view('create-building');
    }

    public function CreateBuilding(Request $request)
    {
       $building = new Buildings();

       $building->name = $request->name;
       $building->address = $request->address;
       $building->developer = $request->developer;
       $building->building_Id = Helper::Generator(new Buildings,'building_Id',5,'BID');
       
       
       

       $res = $building->save();
       return redirect()->route('building.table');
    }
    
    public function GetBuildingUpdateForm(Request $request)
    {
        $data = Buildings::find($request->id);
        

        return view('update-building', compact('data'));
    }

    public function UpdateBuilding(Request $request,$id)
    {
        $data = Buildings::find($id);

       $data->name = $request->input("name");
       $data->address = $request->input("address");
       $data->developer = $request->input("developer");
       
       
       
       

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
