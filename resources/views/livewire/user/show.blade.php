<div class="relative mb-6 w-full">

    <flux:modal class="md:w-96" name="show-user" title="Show User">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Show User</flux:heading>
                <flux:text class="mt-2">You Can View Single user with list of roles</flux:text>
            </div>

            <flux:input label="Name of User" readonly wire:model="user" placeholder="User" />
            <flux:input type="email" wire:model="email" readonly label="User Email" placeholder="Email" />
            {{-- <flux:input type="password" wire:model="password" label="User Password" placeholder="Password" /> --}}

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

            </div>
        </div>
    </flux:modal>
</div>
