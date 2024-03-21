<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolCoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('school_courses')->delete();
        
        \DB::table('school_courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'years' => 4,
                'start_at' => '2024-02-28',
                'end_at' => '2024-02-28',
                'certification_id' => 41,
                'school_id' => 310,
                'course_id' => 47,
                'is_active' => 1,
                'created_at' => '2024-02-28 11:57:57',
                'updated_at' => '2024-02-28 11:57:57',
            ),
            1 => 
            array (
                'id' => 2,
                'years' => 4,
                'start_at' => '2024-03-04',
                'end_at' => '2024-03-20',
                'certification_id' => 41,
                'school_id' => 310,
                'course_id' => 36,
                'is_active' => 1,
                'created_at' => '2024-03-04 11:56:50',
                'updated_at' => '2024-03-04 11:56:50',
            ),
            2 => 
            array (
                'id' => 3,
                'years' => 4,
                'start_at' => '2024-03-04',
                'end_at' => '2025-03-11',
                'certification_id' => 41,
                'school_id' => 310,
                'course_id' => 92,
                'is_active' => 1,
                'created_at' => '2024-03-04 12:07:38',
                'updated_at' => '2024-03-04 12:07:38',
            ),
        ));
        
        
    }
}