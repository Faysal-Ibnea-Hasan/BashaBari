<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use App\Models\Tenants;
use App\Models\Buildings;
use App\Models\Flats;

class DashboardController extends Controller
{
    public function GetDashboard()
    {
        $totalOwner = Owners::count();
        $totalTenant = Tenants::count();
        $totalBuilding = Buildings::count();
        $totalFlat = Flats::count();
        return view('welcome-1',compact('totalOwner', 'totalTenant', 'totalFlat','totalBuilding'));
    }

}
