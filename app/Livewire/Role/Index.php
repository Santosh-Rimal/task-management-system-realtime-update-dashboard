<?php

namespace App\Livewire\Role;

use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use App\Events\dashboard\DashboardEvent;

class Index extends Component
{
    use WithPagination;

    public $id;

    public function render()
    {
        return view('livewire.role.index', [
            'roles' => Role::with('permissions')->where('name','!=','Super Admin')->paginate(10),
        ]);
    }

    public function edit($id)
    {
        $this->dispatch('editRole', $id);
    }

    #[On('roleCreated')]
    public function roleCreated($message)
    {
        session()->flash('success', $message);
        Broadcast(new DashboardEvent());
        $this->resetPage();
    }

    #[On('roleUpdated')]
    public function roleUpdated($message)
    {
        session()->flash('success', $message);
    }

    public function delete($id)
    {
        $this->id = $id;
        Flux::modal('delete-role')->show();
    }

    public function deleteRole()
    {
        Role::where('id', $this->id)->delete();
        $this->dispatch('roleDeleted', 'Role deleted successfully.');
        Flux::modal('delete-role')->close();
    }

    #[On('roleDeleted')]
    public function roleDeleted($message)
    {
        session()->flash('delete', $message);
        Broadcast(new DashboardEvent());
        $this->resetPage();
        $this->resetId();
    }

    public function resetId()
    {
        $this->id = null;
    }

    public function show($id)
    {
        $this->dispatch('showRole', $id);
    }
}