<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting=new Setting();
        $setting->title=fake()->title();
        $setting->description=fake()->paragraph();
        $setting->work_description=fake()->paragraph();
        $setting->email=fake()->email();
        $setting->address=fake()->address();
        $setting->contact=fake()->phoneNumber();
        $setting->facebook_url=fake()->url();
        $setting->twitter_url=fake()->url();
        $setting->github_url=fake()->url();
        $setting->instagram_url=fake()->url();
        $setting->save();
    }
}
