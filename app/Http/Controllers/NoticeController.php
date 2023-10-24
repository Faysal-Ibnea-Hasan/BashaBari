<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Buildings;
use App\Models\Notices;

class NoticeController extends Controller
{
    public function GetNoticeForm()
    {
        $dataOwners = Owners::get();
        $dataBuildings = Buildings::get();
        return view('create-notice',compact('dataOwners', 'dataBuildings'));
    }
}
