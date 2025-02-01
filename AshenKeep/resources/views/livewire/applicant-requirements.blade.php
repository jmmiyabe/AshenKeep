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

                    <!-- Loop through grouped requirements -->
                    @forelse($groupedRequirements->groupBy('name') as $name => $requirements)
                        <div class="mb-6" x-data="{ open: false }">
                            <button @click="open = !open" class="text-xl font-bold text-white bg-gray-700 p-2 rounded w-full text-left">
                                {{ $name }}
                            </button>
                            <div x-show="open" class="mt-4">
                                <table id="table-{{ Str::slug($name) }}" class="table-auto w-full border-collapse border border-gray-200">
                                    <thead class="bg-gray-100 text-black">
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2">ID</th>
                                            <th class="border border-gray-300 px-4 py-2">Requirement Type</th>
                                            <th class="border border-gray-300 px-4 py-2">Files</th>
                                            <th class="border border-gray-300 px-4 py-2">Status</th>
                                            <th class="border border-gray-300 px-4 py-2">Submitted At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requirements as $index => $requirement)
                                            <tr>
                                                @if($index === 0)
                                                    <td class="border border-gray-300 px-4 py-2" rowspan="{{ count($requirements) }}">
                                                        {{ $requirement->id }}
                                                    </td>
                                                @endif
                                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($requirement->requirement_type) }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    @if(is_array($requirement->files))
                                                        @foreach($requirement->files as $file)
                                                            <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-500 underline">View File</a><br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($requirement->status) }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $requirement->created_at->format('Y-m-d H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-white">No requirements submitted yet.</p>
                    @endforelse

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $groupedRequirements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
