<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Finance Staff') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <!-- Sidebar -->
        <div class="hidden sm:flex">
            <x-dashboard-side-bar />
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="py-1">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <h1 class="text-2xl font-bold mb-6">Hi, {{ Auth::user()->name }}!</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-900 rounded-lg p-4 min-h-[100px] flex items-center justify-center">
                                <!-- Content for the first square -->
                                <p class="text-white">First Square Content</p>
                            </div>
                            <div class="bg-blue-900 rounded-lg p-4 min-h-[100px] flex items-center justify-center">
                                <!-- Content for the second square -->
                                <p class="text-white">Second Square Content</p>
                            </div>
                            <div class="bg-blue-900 rounded-lg p-4 min-h-[100px] flex items-center justify-center">
                                <!-- Content for the third square -->
                                <p class="text-white">Third Square Content</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
