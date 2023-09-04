<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenants;

class TenantController extends Controller
{
    public function GetTenantList()
    {
        // $data = $id?Owners::find($id):Owners::with('Buildings');
        $data = Tenants::get();
        return view('table-tenant',compact('data'));
    }
    public function GetTenantForm()
    {
        
        return view('create-tenant');
    }

    public function CreateTenant(Request $request)
    {
       $tenant = new Tenants();

       $tenant->name = $request->name;
       $tenant->mobile = $request->mobile;
       $tenant->address = $request->address;
       $tenant->password = $request->password;
       $tenant->nid = $request->nid;
       $tenant->image = $request->image;
       

       $res = $tenant->save();
       return redirect()->route('tenant.table');
    }
    
    public function GetTenantUpdateForm(Request $request)
    {
        $data = Tenants::find($request->id);
        

        return view('update-tenant', compact('data'));
    }

    public function UpdateTenant(Request $request,$id)
    {
        $data = Tenants::find($id);

       $data->name = $request->input("name");
       $data->mobile = $request->input("mobile");
       $data->address = $request->input("address");
       $data->password = $request->input("password");
       $data->nid = $request->input("nid");
       $data->image = $request->input("image");
       

       $data->update();

       return redirect()->route('tenant.table');
    }


    public function DeleteTenant($id)
    {
        $data = Tenants::find($id);
        $data->delete();
        

        return redirect()->route('tenant.table');
    }
}
