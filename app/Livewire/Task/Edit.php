<?php

namespace App\Livewire\Task;

use Flux\Flux;
use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
     public $statuses=[],$users=[],$title,$description,$superadmin,
     $image,$status_id,$created_by,$assigned_to,
     $assigned_date,$completed_date,$priority,$alldatas,$tasks,$oldimage,$taskid;
    public function render()
    {
        return view('livewire.task.edit');
    }
    public function mount()
    {
            $this->statuses = Status::get();    
            $this->users = User::get();
            $this->tasks = Task::get();
    }
 use WithFileUploads;
    #[On('edittask')]
    public function edittask($id)
    {
        $this->tasks=Task::where('id',$id)->first();
        $this->taskid=$this->tasks->id;
        $this->users=User::get();
        $this->statuses=Status::get();    
        $this->title=$this->tasks->title;
        $this->description=$this->tasks->description;
        $this->oldimage=$this->tasks->image;
        // dd($this->image);
        $this->status_id=$this->tasks->status_id;
        $this->completed_date=$this->tasks->completed_date;
        $this->created_by=$this->tasks->created_by;
        $this->assigned_to=$this->tasks->assigned_to;
        $this->assigned_date=$this->tasks->assigned_date;
        $this->priority=$this->tasks->priority;
        // dd($this->completed_date);
        Flux::modal('update-task')->show();
    }
    
    public function updatetask()
    {
    $task = Task::findOrFail($this->taskid);
    // dd($task);
    if ($this->image) {
    $imagePath = $this->image->store('taskimages', 'public');
    } else {
    $imagePath = $this->oldimage;
    }
// dd($imagePath);
    $task->update([
    'title' => $this->title,
    'description' => $this->description,
    'image' => $imagePath,
    'status_id' => $this->status_id,
    'assigned_to' => $this->assigned_to,
    'assigned_date' => $this->assigned_date,
    'completed_date' => $this->completed_date,
    'priority' => $this->priority,
    ]);

    $this->dispatch('taskUpdated', 'Task updated successfully.');
    $this->resetForm();
    Flux::modal('update-task')->close();
    }
    public function resetForm()
    {
    $this->title='';
    $this->description=''; 
    $this->image=''; 
    $this->status_id='';
    $this->assigned_to=''; 
    $this->assigned_date='' ;
    $this->completed_date='';
    $this->priority='';
    $this->taskid='';
    }
   
}