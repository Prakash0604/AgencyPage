<?php

namespace Database\Seeders;

use App\Models\frontend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class frontendseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        frontend::create([
            'about_us_title'=>fake()->title(),
            'about_us_description'=>fake()->paragraph(),
            'about_us_value'=>fake()->title(),
            'about_us_value_description'=>fake()->paragraph(),
            'contact_us_email'=>fake()->email(),
            'contact_us_address'=>fake()->address(),
            'contact_us_number'=>fake()->phoneNumber(),
        ]);
    }
}
