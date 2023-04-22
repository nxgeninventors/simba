<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Country;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $countries = Country::all();

        foreach ($countries as $country) {
            for ($i = 0; $i < 10; $i++) {
                Client::create([
                    'name' => $faker->company,
                    'website' => $faker->url,
                    'industry' => $faker->jobTitle,
                    'description' => $faker->paragraph,
                    'country_id' => $country->id,
                    'email' => $faker->unique()->safeEmail,
                    'mobile' => $faker->phoneNumber,
                    'street_address' => $faker->streetAddress,
                    'city' => $faker->city,
                    'state' => $faker->state,
                    'zip' => $faker->postcode,
                    'gst_no' => $faker->regexify('[A-Z0-9]{15}'),
                ]);
            }
        }
    }
}
