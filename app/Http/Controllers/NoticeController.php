<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Buildings;
use App\Models\Notices;

class NoticeController extends Controller
{
    public function GetNoticeList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Notices::get();
        return view('table-notice',compact('data'));
    }

    public function GetNoticeForm()
    {
        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();
        return view('create-notice',compact('dataOwners', 'dataBuildings'));
    }
    public function CreateNotice(Request $request)
    {
       $notice = new Notices();

       $notice->owner_Id = $request->owner_Id;
       $notice->building_Id = $request->building_Id;
       $notice->title = $request->title;
       $notice->description = $request->description;
       $notice->date = $request->date;



       $res = $notice->save();

       return redirect()->route('notice.table');
    }
    public function GetNoticeUpdateForm(Request $request)
    {
        $data = Notices::find($request->id);

        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();

        return view('update-notice', compact('data', 'dataOwners', 'dataBuildings'));
    }

    public function UpdateNotice(Request $request,$id)
    {
        
        $data = Notices::find($id);


       $data->owner_Id = $request->input("owner_Id");
       $data->building_Id = $request->input("building_Id");
       $data->title = $request->input("title");
       $data->description = $request->input("description");
       $data->owner_Id = $request->input("owner_Id");
       $data->date = $request->input("date");


       $data->update();

       return redirect()->route('notice.table');
    }

    public function DeleteNotice($id)
    {
        $data = Notices::find($id);
        $data->delete();


        return redirect()->route('notice.table');
    }
}
