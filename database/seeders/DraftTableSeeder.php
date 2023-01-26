<?php

namespace Database\Seeders;

use App\Models\Draft;
use App\Models\Magazine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $draft = Draft::factory()->for(Magazine::factory()->count(2))->create();   
    }
}
