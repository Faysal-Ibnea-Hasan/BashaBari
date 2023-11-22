<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Tenants;



class CommonController extends Controller
{
    public function mobile_login(Request $request){
        $mobile = $request->mobile;
        $password = $request->password;
        $type = $request->type;
        if($type == 0){
            $data = Owners::where('mobile','=', $mobile)->where('password','=', $password)->first();
            if($data){

                return response([
                    'status' => true,
                    'massage' => 'Data found',
                    'mobile' => $data->mobile,
                    'password' => $data->password,
                    'owner_Id' => $data->id
                ]);
            }
            else{
                return response([
                    'status' => false,
                    'massage' => 'Data not found'
                ]);
            }
        }
        else if($type == 1){
            $data = Tenants::where('mobile', $mobile)->where('password', $password)->first();
            if($data){

                return response([
                    'status' => true,
                    'massage' => 'Data found',
                    'mobile' => $data->mobile,
                    'password' => $data->password,
                    'tenant_Id' => $data->tenant_Id
                ]);
            }
            else{
                return response([
                    'status' => false,
                    'massage' => 'Data not found'
                ]);
            }
        }
    }
}
