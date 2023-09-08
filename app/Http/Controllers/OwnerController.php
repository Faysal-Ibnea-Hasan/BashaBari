<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Buildings;
use Illuminate\Support\Facades\File;

class OwnerController extends Controller
{
    public function GetOwnerList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Owners::get();
        return view('table-owner',compact('data'));
    }
    public function GetOwnerForm()
    {
        $dataBuildings = Buildings::get();
        return view('create-owner',compact('dataBuildings'));
    }

    public function CreateOwner(Request $request)
    {
       $owner = new Owners();

       $owner->name = $request->name;
       $owner->mobile = $request->mobile;
       $owner->address = $request->address;
       $owner->password = $request->password;
       $owner->nid = $request->nid;
       $owner->building_Id = $request->building_Id;
    //    $owner->image = $request->image;
    if($request->hasfile('image'))
    {
       $file = $request->file('image');
       $filename = time() . '.' . $file->extension();
       $file->move('uploads/owners/' , $filename);
       $owner->image = $filename;
    }
    else
    {
       return $request;
       $owner->image = '';
    }

       $res = $owner->save();
       return redirect()->route('owner.table');
    }
    
    public function GetOwnerUpdateForm(Request $request)
    {
        $data = Owners::find($request->id);
        $dataBuildings = Buildings::get();

        return view('update-owner', compact('data', 'dataBuildings'));
    }

    public function UpdateOwner(Request $request,$id)
    {
        $data = Owners::find($id);

       $data->name = $request->input("name");
       $data->mobile = $request->input("mobile");
       $data->address = $request->input("address");
       $data->password = $request->input("password");
       $data->nid = $request->input("nid");
       $data->building_Id = $request->input("building_Id");
    //    $data->image = $request->input("image");
    if($request->hasfile('image'))
    {
        $destination = 'uploads/owners/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        
        $file = $request->file('image');
        $filename = time() . '.' . $request->image->extension();
        $file->move('uploads/owners/' , $filename);
        $data->image = $filename;
    }
    else
    {
        return $request;
        $data->image='';
    }

    
       $data->update();
       return redirect()->route('owner.table');
    }


    public function DeleteOwner($id)
    {
        $data = Owners::find($id);
        $data->delete();
        

        return redirect()->route('owner.table');
    }
}
