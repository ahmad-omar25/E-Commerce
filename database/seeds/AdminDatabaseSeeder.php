<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Ahmed Omar',
            'email' => 'ahmad.eltaher25@gmail.com',
            'password' => bcrypt('1191993')
        ]);
    }
}
