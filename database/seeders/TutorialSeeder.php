<?php

namespace Database\Seeders;

use App\Models\Tutorial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tutorials = [
            ['name' => 'PHP', 'description' => 'PHP tutorial description'],
            ['name' => 'Laravel', 'description' => 'Laravel tutorial description'],
            ['name' => 'ReactJS', 'description' => 'ReactJS tutorial description'],
            ['name' => 'VueJS', 'description' => 'VueJS tutorial description'],
        ];


        foreach ($tutorials as $tutorial) {
            Tutorial::create($tutorial);
        }
    }
}
