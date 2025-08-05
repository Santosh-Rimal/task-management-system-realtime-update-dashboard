    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4">
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
        <!-- Stats Cards Row -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-5">
            <!-- Total Tasks Card -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Tasks</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $totaltasks ?? 0 }}</h3>
                    </div>
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Users Card -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Users</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $totalusers ?? 0 }}</h3>
                    </div>
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Roles Card -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Roles</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $totalroles ?? 0 }}</h3>
                    </div>
                    <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Permissions Card -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Permissions</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">{{ $totalpermissions ?? '0' }}
                        </h3>
                    </div>
                    <div class="rounded-full bg-yellow-100 p-3 dark:bg-yellow-900">
                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Likes Card -->
            {{-- <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Likes</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">256</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Most liked: "Complete dashboard..." (32)
                        </p>
                    </div>
                    <div class="rounded-full bg-pink-100 p-3 dark:bg-pink-900">
                        <svg class="h-6 w-6 text-pink-600 dark:text-pink-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Task Status and User Roles Section -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Task Status Chart -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Task Status</h3>
                <div class="space-y-4">
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">To Do</span>
                            <span
                                class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $todo }}</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-blue-600" style="width: {{ $todo }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">In Progress</span>
                            <span
                                class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $inprogess }}</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-yellow-500" style="width: {{ $inprogess }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Done</span>
                            <span
                                class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $done }}</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-green-600" style="width: {{ $done }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Roles Distribution -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">User Roles</h3>
                <div class="space-y-4">
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Admin</span>
                            <span
                                class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $admin }}</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-red-600" style="width: {{ $admin }}%"></div>
                        </div>
                        {{-- </div>
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Manager</span>
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">5</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-purple-600" style="width: 12%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Developer</span>
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">22</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-indigo-600" style="width: 52%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Tester</span>
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">8</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-pink-600" style="width: 19%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Guest</span>
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">4</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2 rounded-full bg-cyan-600" style="width: 10%"></div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>

            <!-- Recent Tasks Table -->
            {{-- <div class="rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="p-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Recent Tasks</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3" scope="col">Title</th>
                                <th class="px-6 py-3" scope="col">Status</th>
                                <th class="px-6 py-3" scope="col">Likes</th>
                                <th class="px-6 py-3" scope="col">Assigned To</th>
                                <th class="px-6 py-3" scope="col">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Complete dashboard
                                    design</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        To Do
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-pink-500 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>32</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">Jun 15, 2023</td>
                            </tr>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Implement user
                                    authentication</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        In Progress
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-pink-500 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>18</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Jane Smith</td>
                                <td class="px-6 py-4">Jun 20, 2023</td>
                            </tr>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Fix mobile
                                    responsiveness</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Done
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-pink-500 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>24</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Mike Johnson</td>
                                <td class="px-6 py-4">Jun 10, 2023</td>
                            </tr>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Write API documentation
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        In Progress
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-pink-500 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>12</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Sarah Williams</td>
                                <td class="px-6 py-4">Jun 25, 2023</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Set up database backups
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        To Do
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-pink-500 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>8</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Unassigned</td>
                                <td class="px-6 py-4">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        </div>
