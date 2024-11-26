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
        $setting->title="Midas Technologies";
        $setting->description=fake()->paragraph();
        $setting->work_description=fake()->paragraph();
        $setting->email="jprakashchaudhary858@gmail.com";
        $setting->address="Kupondole";
        $setting->contact="9823681753";
        $setting->facebook_url="facebook.com";
        $setting->twitter_url="twitter.com";
        $setting->github_url="github.com";
        $setting->instagram_url="instagram.com";
        $setting->save();
    }
}
