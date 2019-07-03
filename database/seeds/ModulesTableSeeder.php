<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'parent_id' => '0',
                'module_name' => 'User Management',
                'slug' => 'admin.privilege',
                'menu-class' => 'privilege',
                'icon' => 'fa fa-cog',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '1',
                'module_name' => 'Role',
                'slug' => 'admin.privilege.role',
                'menu-class' => 'role',
                'icon' => 'fa fa-users',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '1',
                'module_name' => 'User',
                'slug' => 'admin.privilege.user',
                'menu-class' => 'user',
                'icon' => 'fa fa-user',
                'order_position' => '2',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Content Management',
                'slug' => 'admin.content-management',
                'menu-class' => 'content-management',
                'icon' => 'fa fa-file-text',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'About us',
                'slug' => 'admin.content-management.about-us',
                'menu-class' => 'about-us',
                'icon' => 'fa fa-file-image-o',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'Message',
                'slug' => 'admin.content-management.message',
                'menu-class' => 'message',
                'icon' => 'fa fa-envelope',
                'order_position' => '2',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'Achievements',
                'slug' => 'admin.content-management.achievements',
                'menu-class' => 'achievements',
                'icon' => 'fa fa-trophy',
                'order_position' => '3',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'Facilities',
                'slug' => 'admin.content-management.facilities',
                'menu-class' => 'facilities',
                'icon' => 'fa fa-th-list',
                'order_position' => '4',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Media Management',
                'slug' => 'admin.media-management',
                'menu-class' => 'media-management',
                'icon' => 'fa fa-image',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '9',
                'module_name' => 'Banner',
                'slug' => 'admin.media-management.banner',
                'menu-class' => 'banner',
                'icon' => 'fa fa-image',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '9',
                'module_name' => 'Gallery',
                'slug' => 'admin.media-management.gallery',
                'menu-class' => 'gallery',
                'icon' => 'fa fa-image',
                'order_position' => '2',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '9',
                'module_name' => 'Video',
                'slug' => 'admin.media-management.video',
                'menu-class' => 'video',
                'icon' => 'fa fa-file-video-o',
                'order_position' => '3',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Bulletin Board Management',
                'slug' => 'admin.bulletin-board-management',
                'menu-class' => 'bulletin-board-management',
                'icon' => 'fa fa-calendar',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '13',
                'module_name' => 'News',
                'slug' => 'admin.bulletin-board-management.news',
                'menu-class' => 'news',
                'icon' => 'fa fa-newspaper-o',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '13',
                'module_name' => 'Event',
                'slug' => 'admin.bulletin-board-management.event',
                'menu-class' => 'event',
                'icon' => 'fa fa-calendar',
                'order_position' => '2',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '13',
                'module_name' => 'Notice',
                'slug' => 'admin.bulletin-board-management.notice',
                'menu-class' => 'notice',
                'icon' => 'fa fa-bell',
                'order_position' => '3',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Testimonial',
                'slug' => 'admin.testimonial',
                'menu-class' => 'testimonial',
                'icon' => 'fa fa-user',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Alumni',
                'slug' => 'admin.alumni',
                'menu-class' => 'alumni',
                'icon' => 'fa fa-users',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Downloads',
                'slug' => 'admin.download',
                'menu-class' => 'download',
                'icon' => 'fa fa-download',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '19',
                'module_name' => 'Result',
                'slug' => 'admin.download.result',
                'menu-class' => 'result',
                'icon' => 'fa fa-file',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '19',
                'module_name' => 'Admission Form',
                'slug' => 'admin.download.admission-form',
                'menu-class' => 'admission-form',
                'icon' => 'fa fa-file',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'SEO',
                'slug' => 'admin.seo',
                'menu-class' => 'seo',
                'icon' => 'fa fa-search',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Settings',
                'slug' => 'admin.settings',
                'menu-class' => 'settings',
                'icon' => 'fa fa-gears',
                'order_position' => '1',
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
