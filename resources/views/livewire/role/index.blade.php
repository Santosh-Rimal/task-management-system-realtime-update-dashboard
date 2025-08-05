<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    @if (session()->has('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="mb-4 p-4 text-sm text-red-700 bg-green-100 rounded-lg dark:bg-red-200 dark:text-red-800">
            {{ session('delete') }}
        </div>
    @endif

    {{-- <x-delete name="delete-role" /> --}}

    <x-customecomponent.delete name="delete-role" delete="deleteRole" />

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-gray-800 dark:to-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                            scope="col">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                            scope="col">Permission</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                            scope="col">Created At</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                            scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-indigo-900/30">
                    @foreach ($roles as $key => $role)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/80 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-2">
                                    <div
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-200 shadow-sm">
                                        {{ $role->name ?? '' }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-200 shadow-sm">
                                        @if ($role->permissions->count() > 0)
                                            @foreach ($role->permissions as $permission)
                                                {{ $permission->name }}
                                            @endforeach
                                        @else
                                            No Permissions Assigned
                                        @endif
                                    </span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                Jun 12, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <x-customecomponent.actionbutton
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $role->id }}" variant="primary" button="Edit" action="edit" />

                                <x-customecomponent.actionbutton
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $role->id }}" variant="primary" button="Show" action="show" />

                                <x-customecomponent.actionbutton
                                    class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $role->id }}" variant="primary" button="Delete" action="delete" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="mt-4">
        {{ $roles->links() }}
    </div>
</div>
