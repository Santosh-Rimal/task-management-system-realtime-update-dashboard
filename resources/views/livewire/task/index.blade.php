<div>
    {{-- Success & Delete Flash Messages --}}
    @if (session()->has('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
            {{ session('delete') }}
        </div>
    @endif

    {{-- Custom Delete Component --}}
    <x-customecomponent.delete name="delete-task" delete="deleteTask" />

    {{-- Responsive Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Assigned To</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Priority</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Assigned Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $task->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->assignee->name ?? 'Unassigned' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $task->status->color ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $task->status->name ?? 'No Status' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @switch($task->priority)
                                    @case('high')
                                        <span class="text-red-600">High</span>
                                    @break

                                    @case('medium')
                                        <span class="text-yellow-600">Medium</span>
                                    @break

                                    @default
                                        <span class="text-green-600">Low</span>
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($task->assigned_date)->format('d F Y') }}
                                ({{ \Carbon\Carbon::parse($task->assigned_date)->diffForHumans() }})
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <x-customecomponent.actionbutton
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $task->id }}" variant="primary" button="Edit" action="edit" />

                                <x-customecomponent.actionbutton
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $task->id }}" variant="primary" button="Show" action="show" />

                                <x-customecomponent.actionbutton
                                    class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $task->id }}" variant="primary" button="Delete" action="delete" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>
