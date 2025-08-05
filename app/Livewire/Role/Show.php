<?php

namespace App\Livewire\Role;

use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Show extends Component
{
    public $role, $allpermissions=[];
    public function render()
    {
        return view('livewire.role.show');
    }
    
    #[On('showRole')]
    public function showRole($id)
    {
        $role = Role::findOrFail($id);
        $this->role = $role->name;
        $this->allpermissions = Permission::get();
        Flux::modal('show-role')->show();
    }  
}