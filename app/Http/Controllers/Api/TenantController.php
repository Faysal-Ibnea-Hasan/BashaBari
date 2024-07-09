<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use Illuminate\Http\Request;
//====================================Import Models====================================
use App\Models\Tenants;
//====================================Import Supports==================================
use Illuminate\Support\Facades\File;

class TenantController extends Controller
{
    public function GetTenantList($id=null)
    {
        $data = $id?Tenants::find($id):Tenants::all();
        $imagePath = 'uploads/tenants/' . $data->image; // 'uploads/tenants/' is the path and  $data->image is for sending image endpoint to

        $imageUrl = asset($imagePath);
        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data,
            'imageUrl' => $imageUrl
        ]);
    }
    public function GetTenantImage($image){
        $imageUrl =asset($image);
        $data = [
            'image_url' => $imageUrl
        ];
        return response()->json($data);

    }
    public function GetTenantListByTenantId($tenant_Id)
    {
        $data = Tenants::where('tenant_Id','=',$tenant_Id)->get();
        // $imagePath = $data->image;

        // $imageUrl = asset($imagePath);


        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
            // 'imageUrl' => $imageUrl


        ]);
    }
    public function CheckTenant(Request $request){
        $mobile = $request->mobile;
        $password = $request->password;
        $data = Tenants::Where('mobile','=',$mobile)->first();
        $data1 = Tenants::Where('password','=',$password)->first();
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
    public function create_tenant_mobile(Request $request){
        $data = new Tenants();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->password = $request->password;
        $data->email = $request->email;
        $data->assign_status = $request->assign_status;

        $data->tenant_Id = Helper::Generator(new Tenants,'tenant_Id',4,'Tenant');
        $data->save();
        return response()->Json([
            'status' => true,
            'massage'=> 'Account created successfully',
            'data' => $data,
            'role' => 1
        ]);
    }
    public function check_tenant_mobile($id){
        // $data = Tenants::where('id',$id)
        // ->where('name', '=', '')
        // ->orWhereNull('name')
        // ->get();
        //dd($data);
        $data = Tenants::find($id);

        if($data->name && $data->nid && $data->address != null){
            return response()->json([
                'status' => true,
                'massage' => 'Registered',
                'data' => $data

            ]);
        }
        else{
            $datas =  [
                'name' => $data->name = '',
                'mobile' => $data->mobile,
                'nid' => $data->nid = '',
                'password' => $data->password,
                'tenant_Id' => $data->tenant_Id,
                'address' => $data->address = '',
                'id' => $data->id,
                'assign_status' => $data->assign_status,
                'email' => $data->email
            ];


            return response()->json([
                'status' => false,
                'massage' => 'Your profile is not complete yet!Please complete',
                'data'=> $datas
            ]);


        }
    }

    public function profile_update_tenant_mobile(Request $request,$id){
        $data = Tenants::find($id);
        $data->name = $request->input("name") ?? "";
       $data->mobile = $request->input("mobile") ?? "";
       $data->address = $request->input("address") ?? "";
       $data->password = $request->input("password") ?? "";
       $data->nid = $request->input("nid") ?? "";
       $data->email = $request->input("email") ?? "";
       $data->assign_status = $request->input("assign_status") ?? "";
    //    $data->image = $request->input("image");
    if($request->hasfile('image')){
        $destination = 'uploads/tenants/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }

        $file = $request->file('image');
        $filename = time() . '.' . $request->image->extension();
        $file->move('uploads/tenants/' , $filename);
        $data->image = $filename;
    }
    else{

        $data->image='';
    }


       $data->update();

       return response()->json([
        'status' => true,
        'massage' => 'Tenant updated successfully',
        'data' => $data
       ]);

    }


    public function CreateTenant(Request $request)
    {
       $tenant = new Tenants();

       $tenant->name = $request->name ?? "";
       $tenant->mobile = $request->mobile ?? "";
       $tenant->address = $request->address ?? "";
       $tenant->password = $request->password ?? "";
       $tenant->nid = $request->nid ?? "";
       $tenant->email = $request->email ?? "";
       $tenant->assign_status = $request->assign_status ?? "";
       $tenant->tenant_Id = Helper::Generator(new Tenants,'tenant_Id',4,'Tenant');
       $hasfile=($request->hasfile('image'));
       if($hasfile){
        $file = $request->file('image');
        $image = Storage::disk('public')->putFile('tenant',$file);                //shortcut of storage facades
        $url = Storage::disk('public')->url($image);
        $tenant->image = $url;
        } else {
            $tenant->image = '';
        }

       $res = $tenant->save();
       return response()->json([
        'status' => true,
        'massage' => 'Tenant created successfully',
        ]);
}

public function UpdateAssignStatus(Request $request)
{
    $data = Tenants::where('tenant_Id',$request->tenant_Id)->first();

    $data->assign_status = $request->assign_status;
    $data->save();
    return response()->json([
    'status' => true,
    'massage' => 'Status updated successfully',
   ]);
}

public function UpdateTenant(Request $request)
{
    $data = Tenants::find($request->id);

   $data->name = $request->input("name") ?? $data->name;
   $data->mobile = $request->input("mobile") ?? $data->mobile;
   $data->address = $request->input("address") ?? $data->address;
   $data->password = $request->input("password") ?? $data->password;
   $data->nid = $request->input("nid") ?? $data->nid;
   $data->email = $request->input("email") ?? $data->email;
   $data->assign_status = $request->input("assign_status") ?? $data->assign_status;
   $hasfile=($request->hasfile('image'));
   if($hasfile){
    $file = $request->file('image');
    $image = Storage::disk('public')->putFile('tenant',$file);                //shortcut of storage facades
    $url = Storage::disk('public')->url($image);
    $data->image = $url;
    } else {
        $data->image = $data->image;
    }

   $data->save();
   return response()->json([
    'status' => true,
    'massage' => 'Tenant updated successfully',
   ]);
}
    public function DeleteTenant($id)
    {
        $data = Tenants::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Tenant deleted successfully',
        ]);
    }
}
