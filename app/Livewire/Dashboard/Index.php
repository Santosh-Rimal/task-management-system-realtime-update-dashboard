<?php

namespace App\Livewire\Dashboard;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $totaltasks,$totalusers,$totalroles,$totalpermissions,$inprogess,$todo,$done,$admin;
    public function render()
    {
        return view('livewire.dashboard.index');
    }
    
    public function mount()
    {
        $this->totaltasks=Task::count();
        $this->totalusers=User::count();
       $this->admin = User::whereHas('roles', function ($query) {
       $query->where('name', 'admin');
       })->count();
        $this->totalroles=Role::count();
        $this->totalpermissions=Permission::count();
        $this->todo=Task::whereHas('status',function($query){
            $query->where('name','To Do');
        })->count();
        $this->inprogess=Task::whereHas('status',function($query){
        $query->where('name','In Progress');
        })->count();
        $this->done=Task::whereHas('status',function($query){
        $query->where('name','Done');
        })->count();
        
    }
    #[On('echo:dashboard,.DashboardEvent')]
    public function DashboardEvent(){
        // dd($message);
        $this->reloadpermissions();
        $this->reloadroles();
        $this->reloadtasks();
        $this->reloadusers();
        $this->reloadadmins();
        $this->reloadtodos();
        $this->reloadinprogress();
        $this->reloaddone();
    }

    public function reloadpermissions()
    {
         $this->totalpermissions=Permission::count();
    }

    public function reloadroles()
    {
         $this->totalroles=Role::count();
    }

    public function reloadtasks()
    {
        $this->totaltasks=Task::count();
    }

    public function reloadusers()
    {
        $this->totalusers=User::count();
    }

    public function reloadadmins()
    {
         $this->admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
         })->count();
    }

    public function reloadtodos()
    {
         $this->todo=Task::whereHas('status',function($query){
            $query->where('name','To Do');
         })->count();
    }

    public function reloadinprogress()
    {
        $this->inprogess=Task::whereHas('status',function($query){
            $query->where('name','In Progress');
        })->count();
    }

    public function reloaddone()
    {
         $this->done=Task::whereHas('status',function($query){
            $query->where('name','Done');
        })->count();
    }

}