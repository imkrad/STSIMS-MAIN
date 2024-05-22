<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListMenusTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_menus')->delete();
        
        \DB::table('list_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dashboard',
                'icon' => 'ri-apps-line',
                'route' => '/dashboard',
                'path' => 'Modules/Dashboard',
                'group' => 'Menu',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dropdown',
                'icon' => 'ri-list-check',
                'route' => '/lists/dropdowns',
                'path' => 'Modules/Lists/Dropdowns',
                'group' => 'Lists',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Locations',
                'icon' => 'ri-earth-fill',
                'route' => NULL,
                'path' => 'Modules/Lists/Locations',
                'group' => 'Lists',
                'order' => 3,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Regions',
                'icon' => NULL,
                'route' => '/lists/locations/regions',
                'path' => '/lists/locations/regions',
                'group' => 'Locations',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Provinces',
                'icon' => NULL,
                'route' => '/lists/locations/provinces',
                'path' => '/lists/locations/provinces',
                'group' => 'Locations',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Municipalities',
                'icon' => NULL,
                'route' => '/lists/locations/municipalities',
                'path' => '/lists/locations/municipalities',
                'group' => 'Locations',
                'order' => 3,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Barangays',
                'icon' => NULL,
                'route' => '/lists/locations/barangays',
                'path' => '/lists/locations/barangays',
                'group' => 'Locations',
                'order' => 4,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Directory',
                'icon' => 'ri-book-3-fill',
                'route' => NULL,
                'path' => 'Modules/Directory',
                'group' => 'Menu',
                'order' => 4,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Certifications',
                'icon' => NULL,
                'route' => '/directory/certifications',
                'path' => '/directory/certifications',
                'group' => 'Directory',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Schools',
                'icon' => NULL,
                'route' => '/directory/schools',
                'path' => '/directory/schools',
                'group' => 'Directory',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Courses',
                'icon' => NULL,
                'route' => '/directory/courses',
                'path' => '/directory/courses',
                'group' => 'Directory',
                'order' => 3,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Agencies',
                'icon' => 'ri-government-line',
                'route' => '/lists/agencies',
                'path' => 'Modules/Lists/Agencies',
                'group' => 'Lists',
                'order' => 5,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Scholars',
                'icon' => 'ri-team-fill',
                'route' => NULL,
                'path' => 'Modules/Scholars',
                'group' => 'Menu',
                'order' => 6,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Lists',
                'icon' => NULL,
                'route' => '/scholars/lists',
                'path' => '/scholars/lists',
                'group' => 'Scholars',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Qualifiers',
                'icon' => NULL,
                'route' => '/scholars/qualifiers',
                'path' => '/scholars/qualifiers',
                'group' => 'Scholars',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Endorsements',
                'icon' => NULL,
                'route' => '/scholars/endorsements',
                'path' => '/scholars/endorsements',
                'group' => 'Scholars',
                'order' => 3,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Privileges',
                'icon' => NULL,
                'route' => '/directory/privileges',
                'path' => '/directory/privileges',
                'group' => 'Directory',
                'order' => 4,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Programs',
                'icon' => NULL,
                'route' => '/directory/programs',
                'path' => '/directory/programs',
                'group' => 'Directory',
                'order' => 5,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
        ));

        
    }
}