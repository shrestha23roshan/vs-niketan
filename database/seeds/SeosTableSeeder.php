<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seos')->insert([
            [
                'page' => 'home',
                'meta_title' => 'Home',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'about-us',
                'meta_title' => 'About Us',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'facilities',
                'meta_title' => 'Facilities',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'events',
                'meta_title' => 'Events',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'news & update',
                'meta_title' => 'News & Updates',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'images',
                'meta_title' => 'Images',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'videos',
                'meta_title' => 'Videos',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'alumni',
                'meta_title' => 'Alumni',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'results',
                'meta_title' => 'Results',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'admission form',
                'meta_title' => 'Admission Form',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'alumni form',
                'meta_title' => 'Alumni Form',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'contact-us',
                'meta_title' => 'Contact Us',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
