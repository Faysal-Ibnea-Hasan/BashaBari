<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ========================================Import Models ====================================
use App\Models\Create_Search_Agents;

class CreateSearchAgentController extends Controller
{
    public function CreateSearchAgent(Request $request)
    {
        $data = new Create_Search_Agents();

        $data->name = $request->name ?? "";
        $data->email = $request->email ?? "";
        $data->mobile = $request->mobile ?? "";
        $data->city = $request->city ?? "";
        $data->room = $request->room ?? "";
        $data->rent_value = $request->rent_value ?? "";
        $data->rent_package = $request->rent_package ?? "";
        $data->rent_month = $request->rent_month ?? "";
        $data->rent_type = $request->rent_type ?? "";
        $data->additional_requirements = $request->additional_requirements ?? "";
        $data->status = $request->status ?? "";

        $data->save();
        return response()->Json([
            'status' => true,
            'massage' => 'Request submitted successfully'
        ]);
    }

    public function GetCreateSearchAgent($id=null){
        $data = $id?Create_Search_Agents::find($id):Create_Search_Agents::all();
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }
}
