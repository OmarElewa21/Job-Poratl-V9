<?php

namespace Database\Seeders;

use App\Models\CmsServices;
use Illuminate\Database\Seeder;

class CmsServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            ['key' => 'home_title', 'value' => 'Join us & Explore Thousands of Jobs'],
            ['key' => 'home_description', 'value' => 'Find Jobs, Employment & Career Opportunities'],
            ['key' => 'home_banner', 'value' => 'web_front/images/resource/home_banner.png'],
            ['key' => 'about_title_one', 'value' => 'Register'],
            ['key' => 'about_description_one', 'value' => 'Start by creating an account on our awesome platform'],
            ['key' => 'about_image_one', 'value' => 'web_front/images/resource/work-1.png'],
            ['key' => 'about_title_two', 'value' => 'Submit Resume'],
            ['key' => 'about_description_two', 'value' => 'Fill out our forms and submit your resume right away'],
            ['key' => 'about_image_two', 'value' => 'web_front/images/resource/work-2.png'],
            ['key' => 'about_title_three', 'value' => 'Start Working'],
            ['key'   => 'about_description_three',
             'value' => 'Start your new career by working with one of the most successful companies',
            ],
            ['key' => 'about_image_three', 'value' => 'web_front/images/resource/work-3.png'],
        ];
        
        foreach ($input as $data)
        {
            CmsServices::create($data);
        }
    }
}
