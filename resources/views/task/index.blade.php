<x-layouts.app :title="__('Tasks')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">
            {{ __('Tasks') }}
        </flux:heading>
        <flux:subheading class="mb-6" size="lg">
            {{ __('Manage Tasks') }}
        </flux:subheading>
        <flux:modal.trigger class="flex justify-end" name="create-task">
            <flux:button class="cursor-pointer">Create Task</flux:button>
        </flux:modal.trigger>
        <flux:separator variant="subtle" />
    </div>
    @can('tasks.create')
        <livewire:task.create />
    @endcan
    @can('tasks.edit')
        <livewire:task.edit />
    @endcan
    @can('tasks.view')
        <livewire:task.index />
    @endcan
    @can('tasks.single.view')
    <livewire:task.show />
    @endcan
</x-layouts.app>
