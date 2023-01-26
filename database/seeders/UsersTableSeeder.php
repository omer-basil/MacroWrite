<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use App\Models\User;
use App\Models\Magazine;
use App\Models\Draft;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->has(Magazine::factory()->count(1)->has(Draft::factory()->count(5)))->count(100)->create();
    }
    
}
