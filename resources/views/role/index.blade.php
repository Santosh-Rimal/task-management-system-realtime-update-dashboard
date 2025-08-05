<x-layouts.app :title="__('Roles')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">
            {{ __('Role') }}
        </flux:heading>
        <flux:subheading class="mb-6" size="lg">
            {{ __('Manage Role') }}
        </flux:subheading>
        <flux:modal.trigger class="flex justify-end py-2" name="create-role">
            <flux:button class="cursor-pointer">
                Create Role
            </flux:button>
        </flux:modal.trigger>
        <flux:separator variant="subtle" />
    </div>
    @can('roles.create')
        <livewire:role.create />
    @endcan
    @can('roles.edit')
        <livewire:role.edit />
    @endcan
    @can('roles.view')
        <livewire:role.index />
    @endcan
    @can('roles.single.view')
        <livewire:role.show />
    @endcan

</x-layouts.app>
