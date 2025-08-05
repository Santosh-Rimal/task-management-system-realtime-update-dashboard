<div class="relative mb-6 w-full">
    {{-- <flux:modal.trigger name="update-permission">
        <flux:button class="cursor-pointer">Update Permission</flux:button>
    </flux:modal.trigger> --}}

    <flux:modal class="md:w-96" name="update-permission" title="update Permission">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update Permission</flux:heading>
                <flux:text class="mt-2">You Can update a permission frokm here</flux:text>
            </div>

            <flux:input label="Name of Permission" wire:model="permission" placeholder="Permssion" />

            <div class="flex">
                <flux:spacer />

                <flux:button class="cursor-pointer" wire:click="updatePermission" type="submit" variant="primary">
                    Update Permission
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
