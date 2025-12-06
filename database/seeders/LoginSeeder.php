<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name'=> 'Admin',
            'email' => 'cnconlineexam@gmail.com',
            'password'=> Hash::make('cnc700121'),   
            'role_id'=> 1
        ]);
    }
}
