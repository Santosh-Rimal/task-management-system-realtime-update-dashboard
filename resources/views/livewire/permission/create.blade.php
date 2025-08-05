<div class="relative mb-6 w-full">
 

    <flux:modal class="md:w-96" name="create-permission" title="Create Permission">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Permission</flux:heading>
                <flux:text class="mt-2">You Can create a permission frokm here</flux:text>
            </div>

            <flux:input label="Name of Permission" wire:model="permission" placeholder="Permssion" />

            <div class="flex">
                <flux:spacer />

                <flux:button class="cursor-pointer" wire:click="createPermission" type="submit" variant="primary">
                    Create Permission
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
