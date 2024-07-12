<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//=============================================Import Models==========================================
use App\Models\Owners;
use App\Models\Buildings;
use App\Models\Flats;
//=============================================Import Supports========================================
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function GetOwnerList($id = null)
    {
        $data = $id ? Owners::find($id) : Owners::all();

        return response()->json([
            'status' => true,
            'massage' => 'success',
            'data' => $data
        ]);
    }

    public function CheckOwner(Request $request)
    {
        $mobile = $request->mobile;
        $password = $request->password;
        $data = Owners::Where('mobile', '=', $mobile)->first();
        $data1 = Owners::Where('password', '=', $password)->first();
        if ($data && $data1) {
            return response()->json([
                'status' => true,
                'massage' => 'Found',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'massage' => 'Not Found',

            ]);
        }
    }

    public function profile_update_owner_mobile(Request $request)
    {
        $data = Owners::find($request->id);
        $data->name = $request->input("name") ?? "";
        $data->mobile = $request->input("mobile") ?? "";
        $data->address = $request->input("address") ?? "";
        $data->password = $request->input("password") ?? "";
        $data->nid = $request->input("nid") ?? "";
        $data->email = $request->input("email") ?? "";
        $hasfile = ($request->hasfile('image'));
        if ($hasfile) {
            $file = $request->file('image');
            $image = Storage::disk('public')->putFile('owner', $file);
            $url = Storage::disk('public')->url($image);
            $data->image = $url;
        } else {
            $data->image = $data->image;
        }

        $data->save();
        return response()->json([
            'status' => true,
            'massage' => 'Owner updated successfully',
            'data' => $data
        ]);
    }

    public function CreateOwner(Request $request)
    {
        $owner = new Owners();

        $owner->name = $request->name ?? "";
        $owner->mobile = $request->mobile ?? "";
        $owner->address = $request->address ?? "";
        $owner->password = $request->password ?? "";
        $owner->nid = $request->nid ?? "";
        $owner->email = $request->email ?? "";
        $hasfile = ($request->hasfile('image'));
        //    dump($hasfile);
        if ($hasfile) {
            $file = $request->file('image');
            // dump($file);
            // dump($file->getClientMimeType());
            // dump($file->getClientOriginalExtension());
            $image = Storage::disk('public')->putFile('image', $file);                //shortcut of storage facades
            //dump($image);
            $url = Storage::disk('public')->url($image);
            //dump($url);
            //dump($owner->image = $url);
            $owner->image = $url;

            // dump(Storage::disk('public')->putFile('image',$file));

            //    $name1 = $file->storeAs('image',$file->guessExtension());
            //    $name2=Storage::disk('public')->putFileAs('image',$file,$file->guessExtension());

            //    dump(Storage::url($name1));
            //    dump(Storage::disk('public')->url($name2));
        } else {
            $owner->image = '';
        }
        $res = $owner->save();
        return response()->json([
            'status' => true,
            'massage' => 'Owner created successfully',
        ]);
    }

    public function UpdateOwner(Request $request)
    {
        $data = Owners::find($request->id);

        $data->name = $request->input("name") ?? $data->name;
        $data->mobile = $request->input("mobile") ?? $data->mobile;
        $data->address = $request->input("address") ?? $data->address;
        $data->password = $request->input("password") ?? $data->password;
        $data->email = $request->input("email") ?? $data->email;
        $data->nid = $request->input("nid") ?? $data->nid;
        $hasfile = ($request->hasfile('image'));
        if ($hasfile) {
            // $file = $request->file('image');
            // $image = Storage::disk('public')->putFile('owner',$file);
            // $url = Storage::disk('public')->url($image);
            // $data->image = $url;
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('owners', $fileName, 'public');
            $fileUrl = Storage::url($filePath);
            $data->image = $fileUrl ?? $data->image;
        }
        $data->update();
        return response()->json([
            'status' => true,
            'massage' => 'Owner updated successfully',
        ]);
    }

    public function DeleteOwner($id)
    {
        $data = Owners::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Owner deleted successfully',
        ]);
    }
}
