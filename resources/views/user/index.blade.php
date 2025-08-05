<x-layouts.app :title="__('Users')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">
            {{ __('User') }}
        </flux:heading>
        <flux:subheading class="mb-6" size="lg">
            {{ __('Manage User') }}
        </flux:subheading>
        <flux:modal.trigger class="flex justify-end py-3" name="create-user">
            <flux:button class="cursor-pointer">
                Create User
            </flux:button>
        </flux:modal.trigger>
        <flux:separator variant="subtle" />
    </div>

    @can('users.create')
        <livewire:user.create />
    @endcan
    @can('users.edit')
        <livewire:user.edit />
    @endcan
    @can('users.view')
        <livewire:user.index />
    @endcan
    @can('users.single.view')
        <livewire:user.show />
    @endcan

</x-layouts.app>
