<?php

namespace App\Livewire\User;

use Flux\Flux;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Events\dashboard\DashboardEvent;

class Index extends Component
{
    use WithPagination;

    public $id;

    public function render()
    {
        return view('livewire.user.index', [
            // Exclude specific email from user list and paginate
            'users' => User::where('email', '!=', '2054santoshrimal@gmail.com')->paginate(10),
        ]);
    }

    // Fired when a user is created
    #[On('userCreated')]
    public function userCreated($message)
    {
        session()->flash('success', $message);
        Broadcast(new DashboardEvent());
        $this->resetPage(); // Go to page 1 after creation
    }

    // Fired when reload is requested externally
    #[On('reload')]
    public function reload()
    {
        $this->resetPage(); // Just reset pagination
    }

    // Dispatch to edit user modal
    public function edit($id)
    {
        $this->dispatch('editUser', $id);
    }

    // Fired when a user is updated
    #[On('userUpdated')]
    public function userUpdated()
    {
        session()->flash('success', 'User updated successfully!');
    }

    // Dispatch to show user modal
    public function show($id)
    {
        $this->dispatch('showUser', $id);
    }

    // Open the delete confirmation modal
    public function delete($id)
    {
        $this->id = $id;
        Flux::modal('delete-user')->show();
    }

    // Delete the user and close modal
    public function deleteuser()
    {
        User::where('id', $this->id)->delete();
        $this->dispatch('roleuser', 'User deleted successfully.');
        Flux::modal('delete-user')->close();
    }

    // Flash delete success message
    #[On('roleuser')]
    public function roleDeleted($message)
    {
        session()->flash('delete', $message);
        Broadcast(new DashboardEvent());
        $this->resetPage(); // Refresh pagination
        $this->resetId();
    }

    // Reset selected user ID
    public function resetId()
    {
        $this->id = null;
    }
}