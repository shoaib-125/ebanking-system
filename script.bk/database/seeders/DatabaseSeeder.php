<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\AutoPaymentGetwaySeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
             UserTableSeeder::class,
             AutoPaymentGetwaySeeder::class,
             OptionTableSeeder::class,
        ]);
    }
}
