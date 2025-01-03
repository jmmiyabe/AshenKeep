<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrator') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <!-- Sidebar -->
        <div class="hidden sm:flex">
            <x-dashboard-side-bar />
        </div>

        <!-- Main Content -->
         <div class="w-full px-8">
            <h1 class="text-3xl font-bold mb-6">Hi, Admin!</h1>

            <div class="max-h-96 overflow-auto border border-black bg-blue-900 text-white rounded-lg p-6 w-3/4 ml-auto mr-[100px]">
                <h2 class="text-2xl font-semibold text-white mb-4">Requirements for Approval</h2>
                <table class="table-fixed w-full divide-y divide-gray-200 text-center border-collapse border-separate border-spacing-y-2 rounded-md overflow-hidden">
                <thead class="bg-blue-900">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Type</th>
                        <th class="p-3">Format</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Time</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
        
    </div>
</x-app-layout>
