<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     'name' => $this->faker->name,
        //     'email' => $this->faker->unique()->safeEmail,
        //     'email_verified_at' => now(),
        //     'dob' => $this->faker->date,
        //     'profession' => $this->faker->name,
        //     'password' => $this->faker->password_hash, // password
        //     'remember_token' => Str::random(10),
        // ]);

        \App\Models\User::factory()->count(10)->create(); 
    }
}
