<?php

namespace App\Livewire\Role;

use Flux\Flux;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $role, $allpermissions,$permissions;
    public function render()
    {
        return view('livewire.role.create');
    }
    public function mount()
    {
        $this->allpermissions = Permission::get();
    }
    
    public function createRole()
    {
       $this->validate([
            'role' => 'required|unique:roles,name|string|max:255',
            'permissions' => 'required',
        ]);
    
       $role= Role::create(['name' => $this->role]);
       $role->syncPermissions($this->permissions);
       $this->resetForm();
       Flux::modal('create-role')->close();
       $this->dispatch('roleCreated', 'Role created successfully.');
       $this->dispatch('reload');
    }
    public function resetForm()
    {
        $this->role = '';
        $this->permissions = '';
    }
}