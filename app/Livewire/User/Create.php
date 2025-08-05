<?php

namespace App\Livewire\User;

use Flux\Flux;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $allroles, $user, $password, $email, $roles;

    public function render()
    {
        return view('livewire.user.create');
    }

    public function mount()
    {
        $this->allroles = Role::where('name','!=','Super Admin')->get();
    }

    public function createUser()
    {
        $this->validate([
            'user' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required',
        ]);

        // Create user
        $user = User::create([
            'name' => $this->user,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Assign role
        $user->syncRoles($this->roles);

        // Reset form and dispatch events
        $this->resetForm();
        Flux::modal('create-user')->close();
        $this->dispatch('userCreated', 'User created successfully.');
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