<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// =======================================Import Models==================================
use App\Models\Buildings;
use App\Models\Owners;
use App\Models\Flats;
use App\Models\Problems;
use App\Helpers\Helper;
//=======================================Import Support==================================
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    public function GetBuildingList($id=null)
    {
        $data = $id?Buildings::find($id):Buildings::all();
        $data1 = Buildings::with('Flats')->count();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data,$data1
        ]);
    }

    public function GetBuildingByBuilding_Id(Request $request)
    {
        $data = Buildings::where('building_Id','=', $request->building_Id)->get();
        $totalFlats = Flats::where('building_Id','=', $request->building_Id)->count();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data,
            'totalFlats' => $totalFlats
        ]);
    }

    public function GetBuildingOwner(Request $request)
    {
        $data = Buildings::where('owner_Id','=',$request->owner_Id)->get();

        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetBuildingOwnerProblem(Request $request)
    {
        $data = Buildings::where('owner_Id','=',$request->owner_Id)->with('Problems')->get();
        $data1 = $data->whereNotNull('problems');//whereNotNull() is used for getting value without null values
       // $data1 = $data->pluck('problems'); get only 'problems' column value

        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data1
        ]);
    }

    public function GetBuildingByArea(Request $request)
    {
        $area = $request->area;
        $data = Buildings::where('area','=',$area)->get();
        $dataAll= Buildings::get();
        if ($area)
        {
            return response()->json([
            'status' => true,
            'massage' => 'Found Success',
            'data' => $data
            ]);
        } else if(!$area){
            return response()->json([
                'status' => true,
                'massage' => 'Not Found',
                'data' => $dataAll
                ]);
        }
    }

    public function CreateBuilding(Request $request)
    {
       $building = new Buildings();

       $building->name = $request->name?? "";
       $building->owner_Id = $request->owner_Id?? "";
       $building->address = $request->address?? "";
       $building->developer = $request->developer?? "";
       $building->building_Id = Helper::Generator(new Buildings,'building_Id',4,'Building');
       $building->date = $request->date?? "";
       $building->parking = $request->parking?? "";
       $building->area = $request->area?? "";
       $building->city = $request->city?? "";
       $building->district = $request->district?? "";
       $building->postal_code = $request->postal_code?? "";
       $building->facilities = $request->facilities?? "";
       $building->price_range = $request->price_range?? "";
       $hasfile=($request->hasfile('image'));
       if($hasfile){
        $file = $request->file('image');
        $image = Storage::disk('public')->putFile('building',$file);                //shortcut of storage facades
        $url = Storage::disk('public')->url($image);
        $building->image = $url;
        } else {
            $building->image = '';
        }

       $res = $building->save();
       return response()->json([
            'status' => true,
            'massage' => 'Building created successfully',
       ]);
    }

    public function UpdateBuilding(Request $request)
    {
        $data = Buildings::find($request->id);

       $data->name = $request->input("name") ?? $data->name;
       $data->address = $request->input("address") ?? $data->address;
       $data->developer = $request->input("developer") ?? $data->developer;
       $data->date = $request->input("date") ?? $data->date;
       $data->parking = $request->input("parking") ?? $data->parking;
       $data->area = $request->input("area") ?? $data->area;
       $data->city = $request->input("city") ?? $data->city;
       $data->district = $request->input("district") ?? $data->district;
       $data->postal_code = $request->input("postal_code") ?? $data->postal_code;
       $data->facilities = $request->input("facilities") ?? $data->facilities;
       $data->price_range = $request->input("price_range") ?? $data->price_range;
       $hasfile=($request->hasfile('image'));
       if($hasfile){
        $file = $request->file('image');
        $image = Storage::disk('public')->putFile('building',$file);                //shortcut of storage facades
        $url = Storage::disk('public')->url($image);
        $data->image = $url;
        } else {
            $data->image = $data->image;
        }

       $data->save();

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
