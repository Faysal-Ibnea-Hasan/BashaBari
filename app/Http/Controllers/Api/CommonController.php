<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ========================================Import Models ====================================
use App\Models\Owners;
use App\Models\Tenants;

class CommonController extends Controller
{
    public function mobile_login(Request $request){
        $mobile = $request->mobile;
        $password = $request->password;
        $type = $request->type;
        if($type == 0){
            $data = Owners::where('mobile','=',$mobile)->where('password','=',$password)->first();
            if($data){
                return response()->json([
                    'status' => true,
                    'massage' => 'Data found',
                    'name' => $data->name,
                    'mobile' => $data->mobile,
                    'empid' => $data->id,
                    'ide' => (string)$data->id,
                    'created_at' => $data->created_at,
                    'updated_at' => $data->updated_at,
                    'role' => $type
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'massage' => 'Data not found'
                ]);
            }
        } else if($type == 1) {
            $data = Tenants::where('mobile', $mobile)->where('password', $password)->first();
            if($data){
                return response()->json([
                    'status' => true,
                    'massage' => 'Data found',
                    'name' => $data->name,
                    'mobile' => $data->mobile,
                    'empid' => $data->id,
                    'ide' => $data->tenant_Id,
                    'created_at' => $data->created_at,
                    'updated_at' => $data->updated_at,
                    'role' => $type

                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'massage' => 'Data not found'
                ]);
            }
        }
    }
}
