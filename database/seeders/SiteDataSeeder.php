<?php

namespace Database\Seeders;

use App\Models\SiteData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SiteData::create([
        //     'site_title'=>'Midas Technologies',
        //     // 'site_description'=>fake()->paragraphs()
        // ]);
        $site=new SiteData();
        $site->site_name="Midas Technology";
        $site->save();
    }
}
