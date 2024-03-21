<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'acronym' => 'DOST-IX',
                'name' => 'Department of Science and Technology - IX',
                'subname' => 'DOST Management System',
                'description' => 'STSIMS (Science & Technology Scholarship Information Management System) envisions to optimize the conduct of scholarship functions, that which in turn will ensure satisfaction among customers both internal and external.',
                'logo' => NULL,
                'logo_light' => NULL,
                'logo_dark' => NULL,
                'icon' => NULL,
                'version' => '1.0.0'
            ),
        ));
        
        
    }
}