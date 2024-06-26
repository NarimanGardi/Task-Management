<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public $project;
    public $tasks;

    public function mount($project)
    {
        $this->project = $project;
        $this->tasks = $project->tasks()->with(['users','groups'])->orderBy('sort_order')->get();
    }

    public function updateTaskOrder($orderedIds)
    {
        $tasks = Task::whereIn('id', array_column($orderedIds, 'value'))->get();
        $orderMap = array_column($orderedIds, 'order', 'value');
    
        foreach ($tasks as $task) {
            $task->sort_order = $orderMap[$task->id];
        }
    
        $tasks->each->save();

        $this->tasks = $this->project->tasks()->with(['users', 'groups'])->orderBy('sort_order')->get();
    }
    
    public function render()
    {
        return view('livewire.task-manager');
    }
}
