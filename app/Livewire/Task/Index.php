<?php

namespace App\Livewire\Task;

use Flux\Flux;
use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Events\dashboard\DashboardEvent;

class Index extends Component
{
    use WithPagination;

    public $id;

    public function render()
    {
      if(Auth::user()->email==='2054santoshrimal@gmail.com'){
        $all=Task::with(['assignee', 'creator'])->paginate(10);
      }else{
       $all = Task::with(['assignee', 'creator'])
       ->where(function ($query) {
       $query->where('created_by', Auth::id())
       ->orWhere('assigned_to', Auth::id());
       })
       ->paginate(10);

      }
    
        return view('livewire.task.index', [
            'tasks' => $all,
        ]);
    }

    public function edit($id)
    {
        $this->dispatch('edittask', $id);
    }

    #[On('taskCreated')]
    public function taskCreated()
    {
        session()->flash('success', 'Task created successfully!');
        Broadcast(new DashboardEvent());
        $this->resetPage();
    }

    #[On('taskUpdated')]
    public function taskUpdated($message)
    {
        session()->flash('success', $message);
    }

    public function delete($id)
    {
        $this->id = $id;
        Flux::modal('delete-task')->show();
    }

    public function deleteTask()
    {
        Task::where('id', $this->id)->delete();
        $this->dispatch('taskDeleted', 'Task deleted successfully.');
        Flux::modal('delete-task')->close();
    }

    #[On('taskDeleted')]
    public function taskDeleted($message)
    {
        session()->flash('delete', $message);
        Broadcast(new DashboardEvent());
        $this->resetPage();
        $this->resetId();
    }
public function show($id)
{
    $this->dispatch('showtask',$id);
}
    public function resetId()
    {
        $this->id = null;
    }
}