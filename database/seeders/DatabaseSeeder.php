<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\QrCodeGeneratorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return [
            AdminSeeder::class
        ];
    }
}
