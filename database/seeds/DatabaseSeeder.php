<?php

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
        factory(App\Client::class, 15000)->create();
        factory(App\Company::class, 15000)->create();

        $companies = App\Company::all();

        // Populate the pivot table
        App\Client::all()->each(function ($client) use ($companies) {
            $client->companies()->attach(
                $companies->random(rand(1, 2))->pluck('id')->toArray()
            );
        });

    }
}
