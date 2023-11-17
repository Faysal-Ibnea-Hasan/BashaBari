<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Buildings;
use App\Models\Flats;
use App\Models\Tenants;
use App\Models\Problems;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function GetProblem($id=null){
        $data = $id?Problems::find($id):Problems::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }
    public function GetProblemByTenantId($tenant_Id){
        $data = Problems::where('tenant_Id',$tenant_Id)->get();
        return response()->Json([
            'status' => true,
            'massage' => 'Data founded',
            'data' => $data
        ]);
    }
    public function CreateProblem(Request $request){
        $data = new Problems();
        $data->building_Id = $request->building_Id;
        $data->flat_Id = $request->flat_Id;
        $data->tenant_Id = $request->tenant_Id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->date = $request->date;
        $data->status = $request->status ?? 'Unsolved';

        $data->save();
        return response()->json([
            'status' => true,
            'massage' => 'Problem created successfully'
        ]);
    }

    public function UpdateProblem(Request $request,$id){
        $data = Problems::find($id);

        $data->building_Id = $request->input('building_Id');
        $data->flat_Id = $request->input('flat_Id');
        $data->tenant_Id = $request->input('tenant_Id');
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->date = $request->input('date');
        $data->status = $request->input('status') ?? 'Unsolved';

        $data->update();

        return response()->json([
            'status' => true,
            'massage' => 'Problem Updated successfully'
        ]);

    }
    public function UpdateProblemStatus(Request $request,$id){
        $data = Problems::find($id);


        $data->status = $request->input('status') ?? 'Unsolved';

        $data->update();

        return response()->json([
            'status' => true,
            'massage' => 'Problem status updated successfully'
        ]);

    }

    public function DeleteProblem($id){
        $data = Problems::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Problem Deleted successfully'
        ]);
    }
}
