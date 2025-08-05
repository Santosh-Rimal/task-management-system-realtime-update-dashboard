<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden p-3">
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
    {{-- Calling custome components --}}
    <x-customecomponent.delete name="delete-permission" delete="deletePermission" />
    {{-- ------------------------------------------- --}}
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    scope="col">Permissions</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    scope="col">Created At</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    scope="col">Actions</th>
            </tr>
        </thead>

        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($permissions as $key => $permission)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                {{ $permission->name ?? '' }}
                            </span>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        Jun 12, 2023
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        @can('permissions.edit')
                            <x-customecomponent.actionbutton
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded text-sm"
                                id="{{ $permission->id }}" variant="primary" button="Edit" action="edit" />
                        @endcan

                        <x-customecomponent.actionbutton
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded text-sm"
                            id="{{ $permission->id }}" variant="primary" button="Show" action="show" />

                        <x-customecomponent.actionbutton
                            class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded text-sm"
                            id="{{ $permission->id }}" variant="primary" button="Delete" action="delete" />

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $permissions->links() }}
    </div>
</div>
