<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
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

    <x-customecomponent.delete name="delete-user" delete="deleteuser" />

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-indigo-900/50">
                <thead class="bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-gray-800 dark:to-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-indigo-200 uppercase tracking-wider"
                            scope="col">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-indigo-200 uppercase tracking-wider"
                            scope="col">Users</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-indigo-200 uppercase tracking-wider"
                            scope="col">Created At</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                            scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-indigo-900/30">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/80 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-2">
                                    @forelse ($user->roles as $role)
                                        <span class="flex flex-wrap gap-2">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-200 shadow-sm">
                                                {{ $role->name }}
                                            </span>
                                        @empty
                                            <span class="text-xs text-gray-400">No users</span>
                                    @endforelse
                                </div>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <x-customecomponent.actionbutton
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $user->id }}" variant="primary" button="Edit" action="edit" />

                                <x-customecomponent.actionbutton
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $user->id }}" variant="primary" button="Show" action="show" />

                                <x-customecomponent.actionbutton
                                    class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded text-sm"
                                    id="{{ $user->id }}" variant="primary" button="Delete" action="delete" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-4 text-gray-500 dark:text-gray-400" colspan="4">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
