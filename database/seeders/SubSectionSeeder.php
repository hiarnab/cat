<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sub_sections = [
            [
                'section_id' => 2,
                'name' => 'Physics Interest',
            ],
            [
                'section_id' => 2,
                'name' => 'Chemistry Interest',
            ],
            [
                'section_id' => 2,
                'name' => 'Biology Interest',
            ]
        ];

        foreach ($sub_sections as $sub_section) {
            \App\Models\SubSection::create($sub_section);
        }
    }
}
