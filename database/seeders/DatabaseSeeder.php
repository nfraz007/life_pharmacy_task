<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create a dummy user for login
        $user = User::create([
            'name' => "John Doe",
            'email' => "admin@gmail.com",
            'password' => Hash::make("12345678"),
        ]);

        // insert factory data
        User::factory(5)->create();
        Product::factory(10)->create();
    }
}
