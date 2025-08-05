<?php

namespace App\Livewire\User;

use Flux\Flux;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $user, $email, $password, $roles,$allroles=[],$id,$singleuser;
    public function render()
    {
        return view('livewire.user.edit');
    }
   
    #[On('editUser')]
    public function editeUser($id)
    {
        $users = User::findOrFail($id);  
        $this->singleuser=$users;
        $this->id = $users->id;
        $this->user = $users->name;
        $this->roles = $users->roles->pluck('name');
        $this->allroles = Role::where('name','!=','Super Admin')->get();
        // dd($this->user->roles->toArray());
        $this->email = $users->email;
        // $this->roles = $this->user->roles->pluck('name');
        Flux::modal('edit-user')->show();
    }
    public function updateUser()
    {
        $this->validate([
        'user' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $this->id,
        'password' => 'required|string|min:8',
        'roles' => 'required',
        ]);

        // Update user
        $this->singleuser->update([
        'name' => $this->user,
        'email' => $this->email,
        'password' => bcrypt($this->password),
        ]);

        // Sync roles
        $this->singleuser->syncRoles($this->roles);

        // Reset form and dispatch events
        $this->resetForm();
        Flux::modal('edit-user')->close();
        $this->dispatch('userUpdated', 'User updated successfully.');
        $this->dispatch('reload');
    }
     public function resetForm()
     {
        $this->user = '';
        $this->email = '';
        $this->password = '';
        $this->roles = '';
     }
}