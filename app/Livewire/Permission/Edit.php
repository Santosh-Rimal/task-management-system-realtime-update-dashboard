<?php

namespace App\Livewire\Permission;

use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public $permissions,$permission,$permissionId;
    public function render()
    {
        return view('livewire.permission.edit');
    }

 #[On('editPermission')]
 public function editPermission($id)
 {
    $permissions=Permission::findOrFail($id);
    $this->permission = $permissions->name;
    $this->permissionId = $id;
   
    Flux::modal('update-permission')->show();
      
 }
 public function updatePermission()
 {
    $this->validate([
        'permission' => 'required|string|max:255',
    ]);
    Permission::where('id', $this->permissionId)
        ->update(['name' => $this->permission]);
        $this->resetForm();   
       $this->dispatch('permissionUpdated', 'Permission updated successfully.');
    $this->dispatch('reload');
    Flux::modal('update-permission')->close();
 }
 public function resetForm()
 {
    $this->permission = '';
    $this->permissionId = '';
  }
}