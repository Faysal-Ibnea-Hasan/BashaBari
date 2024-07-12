<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ========================================Import Models ====================================
use App\Models\Flats;
use App\Models\Buildings;
// ========================================Import Helpers ====================================
use App\Helpers\Helper;
// ========================================Import Supports ====================================
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FlatController extends Controller
{
    public function GetFlatList($id = null)
    {
        $data = $id ? Flats::find($id) : Flats::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetFlatListByFlatID(Request $request)
    {
        $data = Flats::where('flat_Id', '=', $request->flat_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetAvailableFlat(Request $request)
    {
        $data = Flats::where('status', 'Available')->where('owner_Id', '=', $request->owner_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetFlatListByBuildingID(Request $request)
    {
        $data = Flats::where('building_Id', '=', $request->building_Id)->get();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function GetFlatListByBuilding(Request $request)
    {
        $status = $request->status;
        $data = Flats::where('status', '=', $status)->where('building_id', '=', $request->building_Id)->get();
        $dataAll = Flats::where('building_id', '=', $request->building_Id)->get();

        if ($status) {
            return response()->json([
                'status' => true,
                'massage' => 'Found Success',
                'data' => $data
            ]);
        } else if (!$status) {
            return response()->json([
                'status' => true,
                'massage' => 'Not Found',
                'data' => $dataAll
            ]);
        }
    }
    public function CreateFlat(Request $request)
    {
        $flat = new Flats();

        $flat->owner_Id = $request->owner_Id ?? "";
        $flat->unit_name = $request->unit_name ?? "";
        $flat->building_Id = $request->building_Id ?? "";
        $flat->floor = $request->floor ?? "";
        $flat->area = $request->area ?? "";
        $flat->flat_Id = Helper::Generator(new Flats, 'flat_Id', 4, 'Flat');
        $flat->room = $request->room ?? "";
        $flat->washroom = $request->washroom ?? "";
        $flat->balconi = $request->balconi ?? "";
        $flat->rent_value = $request->rent_value ?? "";
        $flat->status = $request->status ?? "";
        $flat->rent_type = $request->rent_type ?? "";
        $flat->rent_package = $request->rent_package ?? "";
        $hasfile = ($request->hasfile('image'));
        if ($hasfile) {
            $file = $request->file('image');
            $image = Storage::disk('public')->putFile('flat', $file);                //shortcut of storage facades
            //dump($image);
            $url = Storage::disk('public')->url($image);
            $flat->image = $url;
        } else {
            $flat->image = '';
        }

        $res = $flat->save();
        return response()->json([
            'status' => true,
            'massage' => 'Flat created successfully'
        ]);
    }

    public function UpdateFlatStatus(Request $request)
    {
        $data = Flats::where('flat_Id', $request->flat_Id)->first();
        $data->status = $request->input('status');
        $data->update();
        return response()->json([
            'status' => true,
            'massage' => 'Flat status updated successfully',
        ]);
    }

    public function UpdateFlat(Request $request)
    {
        $data = Flats::find($request->id);
        //dd($data);
        $data->owner_Id = $request->input('owner_Id') ?? $data->owner_Id;
        $data->unit_name = $request->input('unit_name') ?? $data->unit_name;
        $data->building_Id = $request->input('building_Id') ?? $data->building_Id;
        $data->floor = $request->input('floor') ?? $data->floor;
        $data->area = $request->input('area') ?? $data->area;
        $data->room = $request->input('room') ?? $data->room;
        $data->washroom = $request->input('washroom') ?? $data->washroom;
        $data->balconi = $request->input('balconi') ?? $data->balconi;
        $data->rent_value = $request->input('rent_value') ?? $data->rent_value;
        $data->status = $request->input('status') ?? $data->status;
        $data->rent_type = $request->input('rent_type') ?? $data->rent_type;
        $data->rent_package = $request->input('rent_package') ?? $data->rent_package;
        $hasfile = ($request->hasfile('image'));
        if ($hasfile) {
            $file = $request->file('image');
            $image = Storage::disk('public')->putFile('flat', $file);                //shortcut of storage facades
            //dump($image);
            $url = Storage::disk('public')->url($image);
            $data->image = $url;
        } else {
            $data->image = $data->image;
        }

        $data->save();
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
