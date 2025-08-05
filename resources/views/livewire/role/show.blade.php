<div class="relative mb-6 w-full">

    <flux:modal class="md:w-96" name="show-role" title="Show Role">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">View Role</flux:heading>
                <flux:text class="mt-2">You Can View Single role with its permissions</flux:text>
            </div>

            <flux:input label="Name of Permission" readonly wire:model="role" placeholder="Role" />

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
            </div>
        </div>
    </flux:modal>
</div>
