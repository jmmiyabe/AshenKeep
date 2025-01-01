<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <!-- Sidebar -->
        <div class="hidden sm:flex">
            <x-dashboard-side-bar />
        </div>

        <!-- MAP -->
        <div class="content-area flex justify-center items-center">
            <div class="map-container" id="mapContainer" style="margin-left: 50px;"></div>
            <!-- Add more boxes -->
        <div class="details-container" id="detailsContainer" style="display: none;">
        <div class="details-box" data-occupied="true">Box 1 - Occupied</div>
        <div class="details-box" data-occupied="false">Box 2 - Available</div>
        <div class="details-box" data-occupied="true">Box 3 - Occupied</div>
        <div class="details-box" data-occupied="false">Box 4 - Available</div>
        </div>
        </div>
</x-app-layout>