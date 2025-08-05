<?php

namespace App\Livewire\Permission;

use Flux\Flux;
use Livewire\Component;
use App\Livewire\Permission\Index;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $permission;
    public function render()
    {
      
        return view('livewire.permission.create');
    }
    public function createPermission()
    {
       $this->validate([
            'permission' => 'required|unique:permissions,name|string|max:255',
        ]);

       Permission::create(['name' => $this->permission]);
       $this->resetForm();
       Flux::modal('create-permission')->close();
       $this->dispatch('permissionCreated', 'Permission created successfully.');
       
    }
    public function resetForm()
    {
        $this->permission = '';
    }
}