<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Buildings;
use App\Models\Flats;
use Illuminate\Support\Facades\File;

class OwnerController extends Controller
{
    public function GetOwnerList($id=null)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = $id?Owners::find($id):Owners::all();

        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }
    public function CheckOwner(Request $request){
        $mobile = $request->mobile;
        $password = $request->password;
        $data = Owners::Where('mobile','=',$mobile)->first();
        $data1 = Owners::Where('password','=',$password)->first();
        if($data && $data1){

            return response()->json([
                'status' => true,
                'massage' => 'Found',
                'data' => $data
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'massage' => 'Not Found',

            ]);
        }
    }
    public function GetOwnerImage($image){
        $path = public_path('uploads/owners/'.$image);
        return response()->file($path);
    }


    public function CreateOwner(Request $request)
    {
       $owner = new Owners();

       $owner->name = $request->name;
       $owner->mobile = $request->mobile;
       $owner->address = $request->address;
       $owner->password = $request->password;
       $owner->nid = $request->nid;
    //    $owner->building_Id = $request->building_Id;

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

       $owner->image = '';
    }

       $res = $owner->save();
       return response()->json([
        'status' => true,
        'massage' => 'Owner created successfully',
   ]);
    }


    public function UpdateOwner(Request $request,$id)
    {
        $data = Owners::find($id);

       $data->name = $request->input("name");
       $data->mobile = $request->input("mobile");
       $data->address = $request->input("address");
       $data->password = $request->input("password");
       if($request->input("nid")){

            $data->nid = $request->input("nid");
        }
        else{
            $data->nid = $data->nid;
        }
       
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

        $data->image=$data->image;
    }


       $data->update();
       return response()->json([
        'status' => true,
        'massage' => 'Owner updated successfully',
       ]);
    }


    public function DeleteOwner($id)
    {
        $data = Owners::find($id);
        $data->delete();


        return response()->json([
            'status' => true,
            'massage' => 'Owner deleted successfully',
        ]);
    }
}
