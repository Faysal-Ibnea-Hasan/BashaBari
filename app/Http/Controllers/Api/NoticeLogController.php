<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Notice_Logs;
use App\Models\Buildings;


class NoticeLogController extends Controller
{
    public function GetNoticeList($id=null)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = $id?Notice_Logs::find($id):Notices::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetNoticeListByOwnerID($owner_Id)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Notice_Logs::where('owner_Id','=',$owner_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'Success',
            'data' => $data
           ]);
    }
    public function GetNoticeListByBuildingID($building_Id)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Notice_Logs::where('building_Id','=',$building_Id)->with('Buildings')->get();

        return response()->json([
            'status' => true,
            'massage' => 'Success',
            'data' => $data
           ]);

    }

    public function CreateNotice(Request $request)
    {
       $notice = new Notice_Logs();

       $notice->owner_Id = $request->owner_Id;
       $notice->building_Id = $request->building_Id;
       $notice->title = $request->title;
       $notice->description = $request->description;
       $notice->date = $request->date;



       $res = $notice->save();

       return response()->json([
        'status' => true,
        'massage' => 'Notice created successfully',
       ]);
    }
    public function UpdateNotice(Request $request,$id)
    {
        $data = Notice_Logs::find($id);


       $data->owner_Id = $request->input("owner_Id");
       $data->building_Id = $request->input("building_Id");
       $data->title = $request->input("title");
       $data->description = $request->input("description");
       $data->owner_Id = $request->input("owner_Id");
       $data->date = $request->input("date");


       $data->update();

       return response()->json([
        'status' => true,
        'massage' => 'Notice updated successfully',
       ]);
    }


    public function DeleteNotice($id)
    {
        $data = Notice_Logs::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Notice deleted successfully',
        ]);
    }
    public function DeleteNoticeAfterTime($owner_Id){
        Notice_Logs::where('owner_id', $owner_Id)->delete();
        return response()->json([
            'status' => true,
            'massage' => 'Notice removed successfully'
        ]);
    }
}
