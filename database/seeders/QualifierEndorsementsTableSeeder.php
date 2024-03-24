<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QualifierEndorsementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qualifier_endorsements')->delete();
        
        \DB::table('qualifier_endorsements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'is_approved' => 0,
                'is_seened' => 0,
                'endorsed_to' => '090000000',
                'endorsed_by' => '100000000',
                'school_id' => 7,
                'course_id' => 47,
                'qualifier_id' => 165,
                'user_id' => 12,
                'created_at' => '2024-01-10 10:27:49',
                'updated_at' => '2024-01-10 10:27:49',
            ),
            1 => 
            array (
                'id' => 2,
                'is_approved' => 0,
                'is_seened' => 0,
                'endorsed_to' => '090000000',
                'endorsed_by' => '100000000',
                'school_id' => 7,
                'course_id' => 47,
                'qualifier_id' => 166,
                'user_id' => 12,
                'created_at' => '2024-01-10 10:27:56',
                'updated_at' => '2024-01-10 10:27:56',
            ),
        ));
        
        
    }
}