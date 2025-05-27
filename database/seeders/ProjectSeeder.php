<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   use App\Models\Project;

public function run(): void
{
    Project::insert([
        ['name' => 'Website Sekolah'],
        ['name' => 'Sistem Informasi Inventaris'],
        ['name' => 'Aplikasi Kasir Sekolah'],
    ]);
}

}
