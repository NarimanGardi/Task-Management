<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Backend Developer',
                'users' => User::inRandomOrder()->limit(3)->pluck('id')->toArray(),
            ],
            [
                'name' => 'Frontend Developer',
                'users' => User::inRandomOrder()->limit(2)->pluck('id')->toArray(),
            ],
            [
                'name' => 'Fullstack Developer',
                'users' => User::inRandomOrder()->limit(4)->pluck('id')->toArray(),
            ],
        ];

        foreach ($groups as $groupData) {
            $group = Group::create(['name' => $groupData['name']]);
            $group->users()->attach($groupData['users']);
        }
    }
}
