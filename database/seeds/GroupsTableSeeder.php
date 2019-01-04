<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Group::truncate();
        $groups = ['Group-A','Group-B'];
        foreach ($groups as $groupName) {
            \App\Group::create([
                'name'=>$groupName
            ]);
        }
    }
}
