<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\House;
use App\Models\Occupant;
use App\Models\Rent;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use SoapBox\Formatter\Formatter;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// Define the User Factory
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// After Creating the User, Create some houses for the user
$factory->afterCreating(User::class, function ($user, Faker $faker) {
	factory(House::class, 2)->create(['user_id' => $user->id]);
});

// Define the House Factory
$factory->define(House::class, function (Faker $faker) {
	// Define the Gender
	$gender_array = ['male', 'female', 'coed'];
	$gender_index = array_rand($gender_array);
	$gender = $gender_array[$gender_index];

	return [
		'name' => $faker->company,
		'gender' => $gender,
		'max_occupants' => $faker->numberBetween(1,15),
		'address' => trim(preg_replace('/\s+/', ' ', $faker->address)),
		'rent' => $faker->numberBetween(350,600)
	];
});

// After Creating the house, add some new occupants for the house
$factory->afterCreating(House::class, function ($house, Faker $faker) {
	factory(Occupant::class, 10)->create(['user_id' => $house->user_id, 'house_id' => $house->id]);
});

// Define the Occupant Factory
$factory->define(Occupant::class, function (Faker $faker) {
	// Define Race Array
	$race_array = ['mixed', 'caucasian', 'native_american', 'asian', 'pacific', 'african_american', 'other'];
	$race_index = array_rand($race_array);
	$race = $race_array[$race_index];

	// Define Gender Array
	$gender_array = ['male', 'female'];
	$gender_index = array_rand($gender_array);
	$gender = $gender_array[$gender_index];

	// Generate Information Array
	$info = [
		'age' => $faker->numberBetween(18, 60),
		'race' => $race,
		'gender' => $gender,
		'phone_number' => '4125551234',
		'nicknames' => $faker->name,
		'date_of_birth' => $faker->date,
		'clean_date' => $faker->date,
		'last_address' => trim(preg_replace('/\s+/', ' ', $faker->address)),
		'drugs_of_choice' => 'Meth, Heroin, Coke, Alcohol',
		'list_of_medications' => 'List Of Medications',
		'health_issues' => 'Health Issues',
		'emergency_name' => $faker->name,
		'emergency_phone' => '4126661234',
		'emergency_address' => trim(preg_replace('/\s+/', ' ', $faker->address)),
		'probation_officer_name' => $faker->name,
		'probation_officer_phone' => '4127771234',
		'probation_reason' => 'Probation Reason',
		'probation_court_date' => $faker->date,
		'move_in_date' => $faker->date,
		'move_out_date' => ''
	];
	// ----------------
	// Convert To JSON
	// ----------------
	$formatter = Formatter::make($info, Formatter::ARR);
	$info_json = $formatter->toJson();

	return [
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'info' => $info_json
	];
});

// Define the Rent Factory
$factory->define(Rent::class, function (Faker $faker) {

	return [
		'occupant_id' => Occupant::inRandomOrder()->first()->id,
		'user_id' => User::inRandomOrder()->first()->id,
		'amount' => $faker->numberBetween(250,375),
		'check_number' => $faker->randomNumber(6),
		'received_at' => $faker->date
	];

});