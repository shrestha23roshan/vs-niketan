<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'heading' => 'School Heading',
                'name' => 'Dr.Babin Pokhrel',
                'designation' => 'Principal',
                'description' => 'School description',
                'attachment' => null,
                'is_active' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'heading' => 'Plus Two Heading',
                'name' => 'Dr.Babin Pokhrel',
                'designation' => 'Principal',
                'description' => 'Plus Two description',
                'attachment' => null,
                'is_active' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'heading' => 'BBA Heading',
                'name' => 'Dr.Babin Pokhrel',
                'designation' => 'Principal',
                'description' => 'BBA description',
                'attachment' => null,
                'is_active' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'heading' => 'EMBA heading',
                'name' => 'Dr.Babin Pokhrel',
                'designation' => 'Principal',
                'description' => 'EMBA description',
                'attachment' => null,
                'is_active' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
