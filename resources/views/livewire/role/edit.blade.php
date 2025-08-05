<div class="relative mb-6 w-full">
    {{-- <flux:modal.trigger name="update-permission">
        <flux:button class="cursor-pointer">Update Permission</flux:button>
    </flux:modal.trigger> --}}

    <flux:modal class="md:w-96" name="update-role" title="update Role">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update Permission</flux:heading>
                <flux:text class="mt-2">You Can update a role from here</flux:text>
            </div>

            <flux:input label="Name of Role" wire:model="role" placeholder="role" />

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

                <flux:button class="cursor-pointer" wire:click="updateRole" type="submit" variant="primary">
                    Update Role
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
