<div class="relative mb-6 w-full">

    <flux:modal class="md:w-96" name="create-role" title="Create Role">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Role</flux:heading>
                <flux:text class="mt-2">You Can create a Role from here</flux:text>
            </div>

            <flux:input label="Name of Permission" wire:model="role" placeholder="Role" />

            <!-- Permissions Selection (Example) -->
            <div>

                <flux:checkbox.group wire:model="permissions" label="Permissions">
                    @foreach ($allpermissions as $permission)
                        <flux:checkbox label="{{ $permission->name }}" value="{{ $permission->name }}" />
                    @endforeach
                </flux:checkbox.group>

            </div>

            <div class="flex">
                <flux:spacer />

                <flux:button class="cursor-pointer" wire:click="createRole" type="submit" variant="primary">
                    Create Role
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
