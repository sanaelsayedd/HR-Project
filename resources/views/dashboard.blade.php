<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Vacation Balance Card -->
                <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h5 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">Vacation Balance</h5>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Remaining Days</p>
                            <p class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $Total_balance }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total Balance</p>
                            <p class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $Balance_Amount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Latest Vacation Request Card -->
                <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h5 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">Latest Vacation Request</h5>
                    <p class="text-gray-500 dark:text-gray-400">No vacation requests found</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
