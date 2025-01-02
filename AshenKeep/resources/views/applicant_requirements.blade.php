<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicant') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <!-- Sidebar -->
        <div class="hidden sm:flex">
            <x-dashboard-side-bar />
        </div>
        <!-- Main Content -->
         <div class="max-h-96 overflow-auto border border-black bg-blue-900 text-white rounded-lg p-6 w-3/4 ml-auto mr-[100px]">
            <h3 class="text-2xl font-semibold mb-6 text-white">Requirements</h3>
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
                <tbody class="auto-rows-auto">
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>
                    <tr class="bg-white text-black">
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                        <td class="p-6"></td>
                    </tr>  
                </tbody>
            </table>
        </div>
    </div>  
</x-app-layout>