<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Group;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Enums\TaskPriorityEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $users = User::all();
        $groups = Group::all();
        $groupCount = $groups->count();
        $priorities = TaskPriorityEnum::cases();

        foreach ($projects as $project) {
            for ($i = 0; $i < 10; $i++) {
                $task =  Task::create([
                    'name' => 'Task ' . Str::random(5),
                    'description' => 'Description for task ' . Str::random(5),
                    'priority' => $priorities[array_rand($priorities)]->value,
                    'start_date' => now()->format('Y-m-d H:i:s'),
                    'due_date' => now()->addDays(rand(1, 30))->format('Y-m-d H:i:s'),
                    'project_id' => $project->id,
                    'sort_order' => $i + 1,
                ]);

                $taskUsers = $users->random(rand(1, 2))->pluck('id')->toArray();
                $task->users()->attach($taskUsers);

                $taskGroups = $groups->random(rand(1, 2))->pluck('id')->toArray();
                $task->groups()->attach($taskGroups);
            }
        }
    }
}
