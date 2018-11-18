<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        factory(Restaurant::class, 10)->create();
    }
}
