<div class="relative mb-6 w-full">

    <flux:modal class="md:w-96" name="show-permission" title="Create Permission">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Show Permission</flux:heading>
                <flux:text class="mt-2">View single Permission</flux:text>
            </div>

            <flux:input label="Name of Permission" readonly wire:model="permission" placeholder="Permssion" />

            <div class="flex">
                <flux:spacer />

            </div>
        </div>
    </flux:modal>
</div>
