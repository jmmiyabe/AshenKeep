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
 
        <div class="flex-1">
            <div class="py-1 h-screen overflow-y-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Hi, {{ Auth::user()->name }}!</h1>
               
                <!-- Vault List Box -->
                <div class="bg-blue-900 rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4"></div>
                        <h2 class="text-white text-xl font-semibold">Vaults List</h2>
                        <div class="flex items-center space-x-4 ml-auto"></div>
                            <select id="locationFilter" class="form-select bg-blue-700 text-white">
                                <option value="All">All</option>
                                <option value="Inner Southwest">Inner Southwest</option>
                                <option value="Outer Northwest">Outer Northwest</option>
                                <option value="Inner South">Inner South</option>
                                <option value="Outer North">Outer North</option>
                            </select>
                            <button class="btn bg-green-500 text-white hover:bg-green-600" id="addRowButton">Add New Vault</button>
                        </div>
                    </div>
 
                    <!-- Vault List Table with White Background -->
                    <div class="bg-white rounded-lg p-6">
                    <div class="overflow-auto max-h-[400px]">
                        <table class="table table-bordered text-gray-800 w-full">
                        <thead class="table-dark">
                            <tr>
                            <th>Vault Number</th>
                            <th>Location</th>
                            <th>Vault Owner ID</th>
                            <th>Owner</th>
                            <th>Date Issued</th>
                            <th>Urns Quantity</th>
                            <th>Availability</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="vaultTableBody">
                            <!-- New Vault Information Appears Here -->
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>