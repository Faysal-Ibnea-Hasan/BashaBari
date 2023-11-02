<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tenants;
use App\Models\Rent_Logs;
use App\Models\Flats;

class RentLogController extends Controller
{
    public function GetRentLogList($id=null)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = $id?Rent_Logs::find($id):Rent_Logs::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }
    public function GetRentLogListByOwner($owner_Id){
        $data = Rent_Logs::where('owner_Id','=',$owner_Id)->with('Tenants')->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }
    public function GetRentLogListByTenant($tenant_Id){
        $data = Rent_Logs::where('tenant_Id','=',$tenant_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }


    public function CreateRentLog(Request $request)
    {
       $rent = new Rent_Logs();

       $rent->tenant_Id = $request->tenant_Id;
       $rent->flat_Id = $request->flat_Id;
       $rent->owner_Id = $request->owner_Id;
       $rent->building_Id = $request->building_Id;
       $rent->joined_at = $request->joined_at;
       $rent->left_at = $request->left_at;


       $res = $rent->save();

       return response()->json([
        'status' => true,
        'massage' => 'Rent created successfully',
        ]);
    }

    public function UpdateRentLogLeftDate(Request $request,$tenant_Id){
        $data = Rent_Logs::where('tenant_Id',$tenant_Id)->first();//first() must be used
        if($data){

            $data->left_at = $request->left_at;
            $data->save();
        }//we need to check if the data is there or not

        return response()->json([
            'status'=> true,
            'massage'=>'Updated successfully'
        ]);
    }

    public function UpdateRentLog(Request $request,$id)
    {
       $data = Rent_Logs::find($id);

       $data->tenant_Id = $request->input("tenant_Id");
       $data->flat_Id = $request->input("flat_Id");
       $data->owner_Id = $request->input("owner_Id");
       $data->building_Id = $request->input("building_Id");
       $data->joined_at = $request->input("joined_at");
       $data->left_at = $request->input("left_at");


       $data->update();

       return response()->json([
        'status' => true,
        'massage' => 'Rent updated successfully',
       ]);
    }


    public function DeleteRentLog($id)
    {
        $data = Rent_Logs::find($id);
        $data->delete();


        return response()->json([
            'status' => true,
            'massage' => 'Rent deleted successfully',
        ]);
    }
}
