<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buildings;
use App\Helpers\Helper;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Buildings::factory()->create([
            'name'=>'Rupayon Apartment',
            'owner_Id'=>'3',
            'developer'=>'Rupayon Real Estate',
            'building_Id'=>Helper::Generator(new Buildings,'building_Id',4,'Building'),
            'date'=>Carbon::today(),
            'parking'=>'Availabe',
            'area'=>'Mirpur',
            'city'=>'Dhaka',
            'district'=>'Dhaka',
            'postal_code'=>'1216',
            'address'=>'Mirpur-2,Dhaka-1216',
            'facilities'=>'Gas (Line),Electricity (DESCO),Lift (Available)',
            'price_range'=>'20000-25000',
            'image'=>'',
        ]);
    }
}
