<?php

namespace Database\Seeders;

use App\Models\unsur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class unsurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        unsur::factory(100)->create();
    }
}
