<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Shops;
use App\Helpers\Helper;

class ShopController extends Controller
{
    public function CreateShop(Request $request)
    {
       $shop = new Shops();

       $shop->space = $request->space;
       $shop->owner_Id = $request->owner_Id;
       $shop->location = $request->location;
       $shop->floor = $request->floor;
       $shop->shop_Id = Helper::Generator(new Shops,'shop_Id',4,'Shop');
       $shop->area = $request->area;
       $shop->city = $request->city;
       $shop->district = $request->district;
       $shop->postal_code = $request->postal_code;
       $shop->facilities = $request->facilities;
       $shop->price_range = $request->price_range;
       $shop->available_from = $request->available_from;
       $shop->protection_money = $request->protection_money;
       $shop->agreement_year = $request->agreement_year;
       $shop->additional_condition = $request->additional_condition;
       $shop->status = $request->status;
       $hasfile=($request->hasfile('image'));
   
       if($hasfile)
       {
        $file = $request->file('image');
        $image = Storage::disk('public')->putFileAs('shop',$file,$file->getClientOriginalName());
        $url = Storage::disk('public')->url($image);
        // $url = Storage::url($image);
        $shop->image = $url;
       }
       
    else
    {
    $shop->image = '';
    }




       $res = $shop->save();
       return response()->json([
            'status' => true,
            'massage' => 'Shop created successfully',
       ]);
    }
    
}
