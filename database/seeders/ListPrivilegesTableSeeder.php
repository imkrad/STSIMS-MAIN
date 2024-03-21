<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListPrivilegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_privileges')->delete();
        
        \DB::table('list_privileges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Stipend',
                'type' => 'Monthly',
                'short' => 'Stipend',
                'regular_amount' => '7000.00',
                'summer_amount' => '7000.00',
                'is_fixed' => 1,
                'is_active' => 1,
                'is_reimburseable' => 0,
                'created_at' => '2022-07-25 09:54:00',
                'updated_at' => '2022-07-25 09:54:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tuition & Other School Fees',
                'type' => 'Term',
                'short' => 'Tuition',
                'regular_amount' => '40000.00',
                'summer_amount' => '10000.00',
                'is_fixed' => 0,
                'is_active' => 1,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 09:55:16',
                'updated_at' => '2022-07-25 09:55:16',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Learning Materials / Connectivity Allowance',
                'type' => 'Term',
                'short' => 'Learning Materials',
                'regular_amount' => '10000.00',
                'summer_amount' => '2000.00',
                'is_fixed' => 1,
                'is_active' => 1,
                'is_reimburseable' => 0,
                'created_at' => '2022-07-25 09:58:29',
                'updated_at' => '2022-07-25 09:58:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Transportation Allowance',
                'type' => 'Academic Year',
                'short' => 'Transportation',
                'regular_amount' => '0.00',
                'summer_amount' => '0.00',
                'is_fixed' => 0,
                'is_active' => 1,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 09:59:41',
                'updated_at' => '2022-07-25 09:59:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Clothing Allowance',
                'type' => 'One-Time',
                'short' => 'Clothing',
                'regular_amount' => '1000.00',
                'summer_amount' => '0.00',
                'is_fixed' => 1,
                'is_active' => 1,
                'is_reimburseable' => 0,
                'created_at' => '2022-07-25 10:01:50',
                'updated_at' => '2022-07-25 10:01:50',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Thesis Allowance',
                'type' => 'One-Time',
                'short' => 'Thesis',
                'regular_amount' => '10000.00',
                'summer_amount' => '0.00',
                'is_fixed' => 1,
                'is_active' => 1,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 10:02:29',
                'updated_at' => '2022-07-25 10:02:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Graduation Allowance',
                'type' => 'One-Time',
                'short' => 'Graduation',
                'regular_amount' => '1000.00',
                'summer_amount' => '0.00',
                'is_fixed' => 1,
                'is_active' => 1,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 10:03:21',
                'updated_at' => '2022-07-25 10:03:21',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Group Accident Insurance',
                'type' => 'Premium',
                'short' => 'Insurance',
                'regular_amount' => '0.00',
                'summer_amount' => '0.00',
                'is_fixed' => 0,
                'is_active' => 1,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 10:03:51',
                'updated_at' => '2022-07-25 10:03:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Others',
                'type' => 'Optional',
                'short' => 'Others',
                'regular_amount' => '0.00',
                'summer_amount' => '0.00',
                'is_fixed' => 0,
                'is_active' => 0,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 10:03:51',
                'updated_at' => '2022-07-25 10:03:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Summer Practical Training',
                'type' => 'One-Time',
                'short' => 'Training',
                'regular_amount' => '0.00',
                'summer_amount' => '14000.00',
                'is_fixed' => 1,
                'is_active' => 1,
                'is_reimburseable' => 1,
                'created_at' => '2022-07-25 10:03:51',
                'updated_at' => '2022-07-25 10:03:51',
            ),
        ));
        
        
    }
}