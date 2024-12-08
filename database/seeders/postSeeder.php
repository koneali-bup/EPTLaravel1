<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        post::factory()->count(10)->create();
    }
}
