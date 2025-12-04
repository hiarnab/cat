<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sections = [
            [
                'name' => 'Mathematics Aptitude',
            ],
            [
                'name' => 'Science Aptitude',
            ],
            [
                'name' => 'Languages Aptitude',
            ],
            [
                'name' => 'Commerce Aptitude',
            ],
            [
                'name' => 'Social Sciences Aptitude',
            ],
            [
                'name' => 'Career Interests',
            ],
            [
                'name' => 'Learning Style',
            ],
            [
                'name' => 'Self-Reflection',
            ],
        ];

        foreach ($sections as $section) {
            \App\Models\Sections::create($section);
        }
    }
}
