<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <div class="hidden sm:flex">
            <x-dashboard-side-bar />
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="py-1 overflow-y-auto">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="overflow-auto border border-black bg-[#102A45] text-white rounded-lg p-6">

                            <!-- Section Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-2xl font-semibold text-white">Requirements</h3>
                                <a href="{{ url('/applicant/submission') }}">
                                    <x-apply-button class="bg-green-500 text-white px-4 py-2 rounded">
                                        Submit Requirements
                                    </x-apply-button>
                                </a>
                            </div>

                            @if(session('success'))
                                <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Table -->
                            <table class="table-auto w-full border-collapse border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2">ID</th>
                                        <th class="border border-gray-300 px-4 py-2">Name</th>
                                        <th class="border border-gray-300 px-4 py-2">Type</th>
                                        <th class="border border-gray-300 px-4 py-2">Files</th>
                                        <th class="border border-gray-300 px-4 py-2">Status</th>
                                        <th class="border border-gray-300 px-4 py-2">Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($requirements as $requirement)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $requirement->id }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $requirement->name }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($requirement->requirement_type) }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                @foreach($requirement->files as $file)
                                                    <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-500 underline">View File</a><br>
                                                @endforeach
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($requirement->status) }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $requirement->created_at->format('Y-m-d H:i') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">No requirements submitted yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
