<flux:modal class="min-w-[22rem]" name="{{ $name }}">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Delete Data?</flux:heading>
            <flux:text class="mt-2">
                <p>You're about to delete this data.</p>
                <p>This action cannot be reversed.</p>
            </flux:text>
        </div>

        <div class="flex gap-2">
            <flux:spacer />
            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>

            <flux:button type="submit" wire:click="{{ $delete }}" variant="danger">Proceed to Delete ?</flux:button>
        </div>
    </div>
</flux:modal>
