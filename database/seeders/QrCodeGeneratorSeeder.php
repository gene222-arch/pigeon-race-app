<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\QrCodeGenerator;
use Illuminate\Database\Seeder;

class QrCodeGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) { 
            QrCodeGenerator::create([
                'value' => Str::random(5)
            ]);
        }
    }
}
