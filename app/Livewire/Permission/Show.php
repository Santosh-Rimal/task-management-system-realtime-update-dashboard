<?php

namespace App\Livewire\Permission;

use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Permission;

class Show extends Component
{
    public $permissions, $permission, $permissionId;
    public function render()
    {
        return view('livewire.permission.show');
    }

    #[On('showPermission')]
    public function showPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permission = $permission->name;
        $this->permissionId = $id;

        Flux::modal('show-permission')->show();
    }
}