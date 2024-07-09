<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//===============================================Import Models============================================
use App\Models\Tenants;
use App\Models\Rents;
use App\Models\Flats;

class RentController extends Controller
{
    public function GetRentList($id=null)
    {
        $data = $id?Rents::find($id):Rents::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetRentListByOwner(Request $request)
    {
        $data = Rents::where('owner_Id','=',$request->owner_Id)->with('Tenants')->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetRentListByTenant(Request $request){
        $data = Rents::where('tenant_Id','=',$request->tenant_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function CreateRent(Request $request)
    {
       $rent = new Rents();

       $rent->tenant_Id = $request->tenant_Id ?? "";
       $rent->flat_Id = $request->flat_Id ?? "";
       $rent->owner_Id = $request->owner_Id ?? "";
       $rent->building_Id = $request->building_Id ?? "";
       $rent->joined_at = $request->joined_at ?? date("Y-m-d");
       $rent->left_at = $request->left_at ?? date("1972-01-01");

       $res = $rent->save();
       return response()->json([
        'status' => true,
        'massage' => 'Rent created successfully',
        ]);
    }

    public function UpdateRent(Request $request)
    {
       $data = Rents::find($request->id);

       $data->tenant_Id = $request->input("tenant_Id") ?? $data->tenant_Id;
       $data->flat_Id = $request->input("flat_Id") ?? $data->flat_Id;
       $data->owner_Id = $request->input("owner_Id") ?? $data->owner_Id;
       $data->building_Id = $request->input("building_Id") ?? $data->building_Id;
       $data->joined_at = $request->input("joined_at") ?? $data->joined_at;
       $data->left_at = $request->input("left_at") ?? $data->left_at;

       $data->update();
       return response()->json([
        'status' => true,
        'massage' => 'Rent updated successfully',
       ]);
    }

    public function DeleteRent($id)
    {
        $data = Rents::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Rent deleted successfully',
        ]);
    }
}
