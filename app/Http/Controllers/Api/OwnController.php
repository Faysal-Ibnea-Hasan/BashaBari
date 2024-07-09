<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//==============================================Import Models============================================
use App\Models\Owners;
use App\Models\Owns;
use App\Models\Flats;

class OwnController extends Controller
{
    public function GetOwnList($id=null)
    {
        $data = $id?Owns::find($id):Owns::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetAssign(Request $request)
    {
        $data = Owns::where('owner_Id','=',$request->owner_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }


    public function CreateOwn(Request $request)
    {
       $own = new Owns();

       $own->owner_Id = $request->owner_Id ?? "";
       $own->flat_Id = $request->flat_Id ?? "";

       $res = $own->save();
       return response()->json([
        'status' => true,
        'massage' => 'Assigned successfully',
   ]);
    }

    public function UpdateOwn(Request $request)
    {
        $data = Owns::find($request->id);

       $data->owner_Id = $request->input("owner_Id");
       $data->flat_Id = $request->input("flat_Id");

       $data->save();
       return response()->json([
        'status' => true,
        'massage' => 'Updated successfully',
       ]);
    }

    public function DeleteOwn($id)
    {
        $data = Owns::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Building deleted successfully',
        ]);
    }
}
