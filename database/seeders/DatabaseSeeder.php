<?php

use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       
        $departments = [
            'Sales and marketing',
            'Application Development',
        ];

        foreach ($departments as $dept) {
            Department::create(['name' => $dept]);
        }

        $designations = [
            'Marketing Manager',
            'Mobile Application Dev',
        ];

        foreach ($designations as $designation) {
            Designation::create(['name' => $designation]);
        }

        User::create([
            'name' => 'Jhon Due',
            'fk_department' => 1, 
            'fk_designation' => 1, 
            'phonenumber' => '7356325765'
        ]);

        User::create([
            'name' => 'Tommy Mark',
            'fk_department' => 2, 
            'fk_designation' => 2,
            'phonenumber' => '7356325766'
        ]);

        User::create([
            'name' => 'Jhon Due',
            'fk_department' => 1, 
            'fk_designation' => 1,
            'phonenumber' => '7356325767'
        ]);

        User::create([
            'name' => 'Tommy Mark',
            'fk_department' => 2, 
            'fk_designation' => 2,
            'phonenumber' => '7356325768'
        ]);
    }
}
