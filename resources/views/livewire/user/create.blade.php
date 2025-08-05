<div class="relative mb-6 w-full">

    <flux:modal class="md:w-96" name="create-user" title="Create User">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create User</flux:heading>
                <flux:text class="mt-2">You Can create a User from here</flux:text>
            </div>

            <flux:input label="Name of User" wire:model="user" placeholder="User" />
            <flux:input type="email" wire:model="email" label="User Email" placeholder="Email" />
            <flux:input type="password" wire:model="password" label="User Password" placeholder="Password" />

            <!-- Permissions Selection (Example) -->
            <div>

                <flux:checkbox.group wire:model="roles" label="roles">
                    @foreach ($allroles as $role)
                        <flux:checkbox label="{{ $role->name }}" value="{{ $role->name }}" />
                    @endforeach
                </flux:checkbox.group>

            </div>

            <div class="flex">
                <flux:spacer />

                <flux:button class="cursor-pointer" wire:click="createUser" type="submit" variant="primary">
                    Create User
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
