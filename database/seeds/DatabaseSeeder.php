<?php

use App\Models\House;
use App\Models\Occupant;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {	
    	// Run Entire Database Seeding
        // factory(User::class, 2)->create();

        // Generate Some House AND Occupants for Primary User
        // factory(House::class, 1)->create(['user_id' => 1]);

        // Generate some occupants for the first house for Primary User
        // $house = House::where('user_id', 1)->first();
        // factory(Occupant::class, 10)->create(['user_id' => 1, 'house_id' => $house->id]);

        // Generate some Rent for the Occupants
        // factory(Rent::class, 500)->create();
    }
}
