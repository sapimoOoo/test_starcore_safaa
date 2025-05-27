<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    TicketType::insert([
        ['name' => 'Insiden'],
        ['name' => 'Perubahan Permintaan'],
        ['name' => 'Penugasan'],
    ]);
}
}