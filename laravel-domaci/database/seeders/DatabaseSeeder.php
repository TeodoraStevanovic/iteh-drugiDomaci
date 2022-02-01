<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\Dog;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Breed::truncate();
        Dog::truncate();
        User::truncate();

        $user = User::factory()->create();

        $breed1 = Breed::factory()->create();
        $breed2 = Breed::factory()->create();
        $breed3 = Breed::factory()->create();



        Dog::factory(4)->create([
            'user_id'=>$user->id,
            'breed_id'=>$breed1->id,
        ]);
        Dog::factory(3)->create([
            'user_id'=>$user->id,
            'breed_id'=>$breed2->id,
        ]);
        Dog::factory(2)->create([
            'user_id'=>$user->id,
            'breed_id'=>$breed3->id,
        ]);

        
       /*kreiramo tri vrste 
       $breed1 = Breed::create(['name'=>"Beagle"]);
       $breed2 = Breed::create(['name'=>"Maltese"]);
       $breed3 = Breed::create(['name'=>"Pug"]);
       */

    }
}
