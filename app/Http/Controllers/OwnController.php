<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Owns;
use App\Models\Flats;

class OwnController extends Controller
{
    public function GetOwnList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Owns::get();
        return view('table-own',compact('data'));
    }
    public function GetOwnForm()
    {
        $dataOwners = Owners::get();
        $dataFlats = Flats::get();
        return view('create-own',compact('dataOwners', 'dataFlats'));
    }

    public function CreateOwn(Request $request)
    {
       $own = new Owns();

       $own->owner_Id = $request->owner_Id;
       $own->flat_Id = $request->flat_Id;
       

       $res = $own->save();
       return redirect()->route('own.table');
    }
    
    public function GetOwnUpdateForm(Request $request)
    {
        $data = Owns::find($request->id);
        $dataOwners = Owners::get();
        $dataFlats = Flats::get();

        return view('update-own', compact('data', 'dataFlats','dataOwners'));
    }

    public function UpdateOwn(Request $request,$id)
    {
        $data = Owns::find($id);

       $data->owner_Id = $request->input("owner_Id");
       $data->flat_Id = $request->input("flat_Id");
       

       $data->update();

       return redirect()->route('own.table');
    }


    public function DeleteOwner($id)
    {
        $data = Owns::find($id);
        $data->delete();
        

        return redirect()->route('own.table');
    }
}
