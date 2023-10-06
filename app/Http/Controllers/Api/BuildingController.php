<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Buildings;
use App\Models\Owners;
use App\Models\Flats;
use App\Helpers\Helper;

class BuildingController extends Controller
{
    public function GetBuildingList($id=null)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = $id?Buildings::find($id):Buildings::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }


    public function CreateBuilding(Request $request)
    {
       $building = new Buildings();

       $building->name = $request->name;
       $building->address = $request->address;
       $building->developer = $request->developer;
       $building->building_Id = Helper::Generator(new Buildings,'building_Id',4,'Building#');
       $building->date = $request->date;




       $res = $building->save();
       return response()->json([
            'status' => true,
            'massage' => 'Building created successfully',
       ]);
    }
    public function AddFlat(Request $request)
    {
        $flat = new Flats();

        $flat->unit_name = $request->unit_name;
        $flat->owner_Id = $request->owner_Id;
        $flat->flat_Id = Helper::Generator(new Flats,'flat_Id',4,'Flat#');

        $res = $flat->save();
        return response()->json([
            'status' => true,
            'massage' => 'Flat created successfully',
        ]);

    }



    public function UpdateBuilding(Request $request,$id)
    {
        $data = Buildings::find($id);

       $data->name = $request->input("name");
       $data->address = $request->input("address");
       $data->developer = $request->input("developer");
       $data->date = $request->input("date");





       $data->update();

       return response()->json([
        'status' => true,
        'massage' => 'Building updated successfully',
       ]);
    }


    public function DeleteBuilding($id)
    {
        $data = Buildings::find($id);
        $data->delete();


        return response()->json([
            'status' => true,
            'massage' => 'Building deleted successfully',
        ]);
    }
}
