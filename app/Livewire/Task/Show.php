<?php

namespace App\Livewire\Task;

use Flux\Flux;
use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\On;

class Show extends Component
{
    public $user_id,$statuses=[], $users=[], $title, $description, $superadmin,
        $image, $status_id, $created_by, $assigned_to,
        $assigned_date, $completed_date, $priority, $tasks;

    public function render()
    {
        return view('livewire.task.show');
    }

    #[On('showtask')]
    public function showtask($id)
    {
        $this->tasks = Task::find($id); // Fix: get only one task
        // dd($this->tasks);
        $this->title = $this->tasks->title;
        $this->description = $this->tasks->description;
        $this->status_id = $this->tasks->status_id;
        $this->user_id = $this->tasks->user_id;
        $this->assigned_to = $this->tasks->assigned_to;
        $this->assigned_date = $this->tasks->assigned_date;
        $this->completed_date = $this->tasks->completed_date;
        $this->priority = $this->tasks->priority;
        $this->image = $this->tasks->image;

        $this->statuses = Status::all(); // load statuses
        $this->users = User::all();      // load users

        Flux::modal('show-task')->show(); // Fix: match modal name
    }
}