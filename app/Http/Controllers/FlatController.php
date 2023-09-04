<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flats;
use App\Models\Buildings;
use App\Helpers\Helper;


class FlatController extends Controller
{
    public function GetFlatList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Flats::get();
        return view('table-flat',compact('data'));
    }
    public function GetFlatForm()
    {
        $dataBuilding = Buildings::get();
        return view('create-flat', compact('dataBuilding'));
    }

    public function CreateFlat(Request $request)
    {
       $flat = new Flats();

       $flat->unit_name = $request->unit_name;
       $flat->building_Id = $request->building_Id;
       $flat->floor = $request->floor;
       $flat->area = $request->area;
       $flat->flat_Id = Helper::Generator(new Flats,'flat_Id',5,'FID');
       $flat->room = $request->room;
       $flat->washroom = $request->washroom;
       $flat->balconi = $request->balconi;
       $flat->rent_value = $request->rent_value;
       $flat->image = $request->image;

       
       
       

       $res = $flat->save();
       return redirect()->route('flat.table');
    }
    
    public function GetFlatUpdateForm(Request $request)
    {
        $data = Flats::find($request->id);
        $dataBuilding = Buildings::get();
        

        return view('update-flat', compact('data', 'dataBuilding'));
    }

    public function UpdateBuilding(Request $request,$id)
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
        $data->image = $request->input('image');
       
       
       
       

       $data->update();

       return redirect()->route('flat.table');
    }


    public function DeleteBuilding($id)
    {
        $data = Flats::find($id);
        $data->delete();
        

        return redirect()->route('flat.table');
    }
}
