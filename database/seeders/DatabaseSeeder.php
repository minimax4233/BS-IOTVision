<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Admin', 'email' => 'admin@test.iot', 'password' => bcrypt('p@ssw0rd'), 'is_admin' => '1']);
        User::factory()->count(50)->create();
    }
}
