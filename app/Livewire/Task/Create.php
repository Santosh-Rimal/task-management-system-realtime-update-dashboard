<?php

namespace App\Livewire\Task;

use Flux\Flux;
use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $statuses,$users,$title,$description,$superadmin,
    $image,$status_id,$created_by,$assigned_to,
    $assigned_date,$completed_date,$priority,$alldatas;
    public function render()
    {
        return view('livewire.task.create');
    }
    public function mount()
    {
        $this->superadmin=User::where('email','2054santoshrimal@gmail.com')->first();
        // dd($this->superadmin);
        $this->statuses=Status::get();
        $this->users=User::get();
    }
    
    use WithFileUploads;
   public function savetask()
{
    $this->alldatas = $this->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'status_id' => 'required|exists:statuses,id',
        'assigned_to' => 'nullable|exists:users,id',
        'priority' => 'required|in:low,medium,high',
        'assigned_date' => 'required|date|after_or_equal:today',
        'completed_date' => 'nullable|date|after_or_equal:assigned_date',
    ]);

    $this->created_by = Auth::id(); // cleaner way
    if ($this->image) {
        $this->alldatas['image'] = $this->image->store('taskimages', 'public');
    } else {
        $this->alldatas['image'] = null;
    }

    $this->alldatas['created_by'] = $this->created_by;

    Task::create($this->alldatas); // ✅ Correct model

    $this->dispatch('taskCreated');
    $this->resetFields();
    Flux::modal('create-task')->close();
}
    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->status_id = '';
        $this->assigned_to = '';
        $this->priority = '';
        $this->assigned_date = '';
        $this->completed_date = '';
    }
}