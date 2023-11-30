<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

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
        return response()->Json([
            'status' => true,
            'totalTenant' => $totalTenant,
            'totalBuilding' => $totalBuilding,
            'totalFlat' => $totalFlat,
            'totalOwner' => $totalOwner,

        ]);
    }

}
