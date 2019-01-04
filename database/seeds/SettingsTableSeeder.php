<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::truncate();
        \App\Setting::create([
            'number_of_matches'=>2, // number of matches for each team before quarter final
            'group_size'=>8
        ]);
    }
}
