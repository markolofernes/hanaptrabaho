<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for($i = 0; $i <10; $i++){
        //     DB::table('jobposts')->insert([
        //         'user_id' => $user_id,
        //         'jobtitle' => fake()->jobTitle,
        //         'joblocation' => fake()->address,
        //         'jobtype' => fake()->jobTitle,
        //         'jobdescription' => fake()->bs,
        //         'salary' => fake()->numberBetween($min = 25000, $max = 80000),
        //     ]);
        // }
    }
}