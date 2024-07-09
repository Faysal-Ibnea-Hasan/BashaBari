<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//===========================================Import Models========================================
use App\Models\Owners;
use App\Models\Notices;
use App\Models\Buildings;

class NoticeController extends Controller
{
    public function GetNoticeList($id=null)
    {
        $data = $id?Notices::find($id):Notices::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetNoticeListByOwnerID(Request $request)
    {
        $data = Notices::where('owner_Id','=',$request->owner_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'Success',
            'data' => $data
        ]);
    }
    public function GetNoticeListByBuildingID(Request $request)
    {
        $data = Notices::where('building_Id','=',$request->building_Id)->with('Buildings')->get();

        return response()->json([
            'status' => true,
            'massage' => 'Success',
            'data' => $data
           ]);
    }

    public function CreateNotice(Request $request)
    {
       $notice = new Notices();

       $notice->owner_Id = $request->owner_Id ?? "";
       $notice->building_Id = $request->building_Id ?? "";
       $notice->title = $request->title ?? "";
       $notice->description = $request->description ?? "";
       $notice->date = $request->date ?? "";

       $res = $notice->save();
       return response()->json([
        'status' => true,
        'massage' => 'Notice created successfully',
       ]);
    }

    public function UpdateNotice(Request $request)
    {
        $data = Notices::find($request->id);

       $data->owner_Id = $request->input("owner_Id") ?? $data->owner_Id;
       $data->building_Id = $request->input("building_Id") ?? $data->building_Id;
       $data->title = $request->input("title") ?? $data->title;
       $data->description = $request->input("description") ?? $data->description;
       $data->owner_Id = $request->input("owner_Id") ?? $data->owner_Id;
       $data->date = $request->input("date") ?? $data->date;

       $data->save();
       return response()->json([
        'status' => true,
        'massage' => 'Notice updated successfully',
       ]);
    }

    public function DeleteNotice($id)
    {
        $data = Notices::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Notice deleted successfully',
        ]);
    }
    
    public function DeleteNoticeAfterTime($owner_Id){
        Notices::where('owner_id', $owner_Id)->delete();
        return response()->json([
            'status' => true,
            'massage' => 'Notice removed successfully'
        ]);
    }
}
