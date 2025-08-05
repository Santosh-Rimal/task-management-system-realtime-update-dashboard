<?php

namespace App\Livewire\Role;

use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
     public $roles,$role,$roleId,$allpermissions=[],$permissions;
    public function render()
    {
        return view('livewire.role.edit');
    }
#[On('editRole')]
 public function editRole($id)
 {
    $roles=Role::where('id',$id)->first();
    $this->roles = $roles;
    $this->allpermissions = Permission::get();
    $this->permissions = $roles->permissions->pluck('name');
    $this->role = $roles->name;
    $this->roleId = $id;
   
    Flux::modal('update-role')->show();
      
 }
 public function updateRole()
 {
    $this->validate([
        'role' => 'required|string|max:255',
         'permissions' => 'required',
    ]);
    Role::where('id', $this->roleId)
        ->update(['name' => $this->role]);
        $this->roles->syncPermissions($this->permissions);
        $this->resetForm();   
       $this->dispatch('roleUpdated', 'Role updated successfully.');
    $this->dispatch('reload');
    Flux::modal('update-role')->close();
 }
 public function resetForm()
 {
    $this->role = '';
    $this->roleId = '';
  }
}