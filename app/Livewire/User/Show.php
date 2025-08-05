<?php

namespace App\Livewire\User;

use Flux\Flux;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    public $allroles=[],$role,$user,$email;
    public function render()
    {
        return view('livewire.user.show');
    }

      #[On('showUser')]
      public function showUser($id)
      {
        $users = User::findOrFail($id);
        $this->user = $users->name;
        $this->email = $users->email;
        $this->allroles=Role::get();
       Flux::modal('show-user')->show();
      }
}