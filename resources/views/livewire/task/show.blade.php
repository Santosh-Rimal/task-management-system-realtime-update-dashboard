<flux:modal class="md:w-96" name="show-task">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">View Task</flux:heading>
            <flux:text class="mt-2">You can view a single task from here.</flux:text>
        </div>

        <flux:input label="Tast title" wire:model="title" readonly placeholder="Title" />

        <flux:textarea label="Description" readonly placeholder="Task description" wire:model="description" />
        <label for="image">Image</label>
        {{-- <input type="file" wire:model="image" /> --}}
        @if ($image)
            <img class="w-20" src="{{ asset('storage/'.$image) }}">
        @endif

        <flux:select label="Status" wire:model="status_id">
            <option disabled selected>Select an status</option>
            @foreach ($statuses as $status)
                <option @if ($tasks->status_id == $status_id) selected @endif>{{ $status->name }}</option>
            @endforeach
        </flux:select>
        @if (Auth::user()->email === '2054santoshrimal@gmail.com')
            <flux:select label="Assign To" wire:model="assigned_to">
                <option disabled selected>Select whom to assign</option>
                @foreach ($users as $user)
                    <option @if ($tasks->user_id == $user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </flux:select>
        @endif
        <flux:input label="Assigned Date" type="date" wire:model="assigned_date" />
        <flux:input label="Completed Date" type="date" wire:model="completed_date" />

        <label for="priority">Priority</label>
        <select class="block w-full mt-2 p-2 border rounded" wire:model="priority">
            <option selected disabled>Select priority level</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>
</flux:modal>
