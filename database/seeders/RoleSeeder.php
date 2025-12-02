<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name'=> 'Admin',
            'description' => 'This is for admin'
        ]);
          Role::create([
            'name'=> 'Student',
            'description' => 'This is for student'
        ]);
    }
}
