<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Flats;
use App\Models\Buildings;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;



class FlatController extends Controller
{
    public function GetFlatList($id=null)
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = $id?Flats::find($id):Flats::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);

    }
    public function GetFlatListByBuilding(Request $request,$building_Id)
    {
        $status = $request->status;
        $data = Flats::where('status','=',$status)->where('building_id','=', $building_Id)->get();
        $dataAll = Flats::where('building_id','=', $building_Id)->get();

        if ($status)
        {
            return response()->json([
            'status' => true,
            'massage' => 'Found Success',
            'data' => $data
            ]);
        }

        else if(!$status){
            return response()->json([
                'status' => true,
                'massage' => 'Not Found',
                'data' => $dataAll
                ]);
        }

    }
    public function GetFlatImage($id)
    {

        // $data = $id?Owners::find($id):Owners::with('Buildings');

        $data = Flats::where('id',$id)->get();

        // $myarray = json_decode($data, true);

        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);

    }
    // public function GetDetails(Request $request)
    // {
    //     $data = Flats::where('id', $request->id)->get();
    //     return view('details-flat',compact('data'));
    // }

    // public function GetDetails($id)
    // {
    //     $data = Flats::find($id);
    //     return response()->json(
    //          $data
    //     );
    // }


    public function CreateFlat(Request $request)
    {
    //    $this->validate($request,[


    //      'image' => 'required',
    //      'image.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:5120'
    //    ]);



       $flat = new Flats();
    //    $data = Flats::Where('building_Id','=',$request->building_Id)->get();
    // //    $data1 = Flats::Where('building_Id','=',$request->building_Id);
    //    if($data){
    //     $data1 = Flats::Where('unit_name','=',$request->unit_name)->get();
    //     if($data1 && $data) {

    //         return response()->json([
    //             "status"=> false,
    //             "massage"=> "Already Exists",

    //             ]

    //         );
    //     }
    //    }
       $flat->owner_Id = $request->owner_Id;
       $flat->unit_name = $request->unit_name;
       $flat->building_Id = $request->building_Id;
       $flat->floor = $request->floor;
       $flat->area = $request->area;
       $flat->flat_Id = Helper::Generator(new Flats,'flat_Id',4,'Flat');
       $flat->room = $request->room;
       $flat->washroom = $request->washroom;
       $flat->balconi = $request->balconi;
       $flat->rent_value = $request->rent_value;
       $flat->status = $request->status;
       if($request->hasfile('image'))
    {
        foreach($request->file('image') as $file)
        {

            // $file = $request->file('image');
            $filename = time().'_'. $file->extension();
            $file->move('uploads/flats/' , $filename);
            $data[] = $filename;
            // $flat->image = $filename;
            $flat->image = json_encode($data);


        }
    }

    else
    {
        $flat->image='';
    }

       $res=$flat->save();
       return response()->json([
        'status' => true,
        'massage' => 'Flat created successfully'
   ]);
 }


    public function UpdateFlat(Request $request,$id)
    {
        $data = Flats::find($id);

        $data->unit_name = $request->input('unit_name');
        $data->building_Id = $request->input('building_Id');
        $data->floor = $request->input('floor');
        $data->area = $request->input('area');

        $data->room = $request->input('room');
        $data->washroom = $request->input('washroom');
        $data->balconi = $request->input('balconi');
        $data->rent_value = $request->input('rent_value');
        $data->status = $request->input('status');
        // $data->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $destination = 'uploads/flats/'.$data->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            foreach($request->file('image') as $file)
            {

                // $file = $request->file('image');
                $filename = $file->extension();
                $file->move('uploads/flats/' , $filename);
                $datas[] = $filename;
                // $flat->image = $filename;
                $data->image = json_encode($datas);
            }
        }


        else
        {
            $data->image=$data->image;
        }
        $data->update();
        return response()->json([
            'status' => true,
            'massage' => 'Flat updated successfully',
           ]);
    }









    public function DeleteFlat($id)
    {
        $data = Flats::find($id);
        $data->delete();


        return response()->json([
            'status' => true,
            'massage' => 'Flat deleted successfully',
        ]);
    }
}
