<?php

namespace Database\Seeders;

use App\Models\MyPigeon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MyPigeonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            MyPigeon::create([
                'image_path' => Str::random(16),
                'user_id' => 2,
                'ring_band' => Str::random(5),
                'gender' => 'Male',
                'status' => 'Active'
            ]);
        }
    }
}
