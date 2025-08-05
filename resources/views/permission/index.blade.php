<x-layouts.app :title="__('Permissions')">
    <div class="relative mb-6 w-full ">
        <flux:heading size="xl" level="1">{{ __('Permissions') }}</flux:heading>
        <flux:subheading class="mb-6" size="lg">{{ __('Manage Permission') }}
        </flux:subheading>
        <flux:modal.trigger class="flex justify-end py-2" name="create-permission">
            <flux:button class="cursor-pointer">Create Permission</flux:button>
        </flux:modal.trigger>
        <flux:separator variant="subtle" />
    </div>
    @can('permissions.create')
        <livewire:permission.create />
    @endcan
    @can('permissions.edit')
        <livewire:permission.edit />
    @endcan
    @can('permissions.view')
        <livewire:permission.index />
    @endcan
    @can('permissions.view')
        <livewire:permission.show />
    @endcan

</x-layouts.app>
