<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Enums\ProjectStatusEnum;
use App\Enums\ProjectPriorityEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $now = now()->format('Y-m-d');
        $projects = [
            [
                'title' => 'Project 1',
                'description' => 'Project 1 Description',
                'status' => ProjectStatusEnum::IN_PROGRESS->value,
                'priority' => ProjectPriorityEnum::LOW->value,
                'start_date' => $now,
                'end_date' => now()->addDays(7)->format('Y-m-d')
            ],
            [
                'title' => 'Project 2',
                'description' => 'Project 2 Description',
                'status' => ProjectStatusEnum::COMPLETED->value,
                'priority' => ProjectPriorityEnum::MEDIUM->value,
                'start_date' => $now,
                'end_date' => now()->addDays(14)->format('Y-m-d')
            ],
            [
                'title' => 'Project 3',
                'description' => 'Project 3 Description',
                'status' => ProjectStatusEnum::IN_PROGRESS->value,
                'priority' => ProjectPriorityEnum::HIGH->value,
                'start_date' => $now,
                'end_date' => now()->addDays(21)->format('Y-m-d')
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
