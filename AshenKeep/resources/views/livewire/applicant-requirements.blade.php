<div class="flex-1">
    <div class="py-1 overflow-y-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-lg p-6">
                <div class="overflow-auto border border-gray-700 bg-[#102A45] text-white rounded-lg p-6">
                    
                    <!-- Section Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-bold text-white">Requirements</h3>
                        <a href="{{ url('/applicant/submission') }}">
                            <x-apply-button class="bg-green-600 hover:bg-green-700 transition duration-300 text-white px-6 py-3 rounded-lg shadow-md">
                                Submit Requirements
                            </x-apply-button>
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-200 text-green-900 p-4 mb-6 rounded shadow-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Loop through grouped requirements -->
                    @forelse($groupedRequirements->groupBy('full_name') as $full_name => $requirements)
                        <div class="mb-6" x-data="{ open: false }">
                            <button @click="open = !open" class="text-lg font-semibold text-white bg-gray-700 hover:bg-gray-600 transition duration-300 p-3 rounded-lg w-full text-left shadow-md flex justify-between items-center">
                                <span>{{ $full_name }}</span>
                                <div class="flex items-center gap-x-3">
                                    <span class="font-semibold {{ $requirements->first()->status === 'approved' ? 'text-green-400' : 'text-red-400' }}">
                                        {{ ucfirst($requirements->first()->status) }}
                                    </span>
                                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                    <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                </div>
                            </button>
                            
                            <div x-show="open" class="mt-4 border border-gray-500 rounded-lg overflow-hidden shadow-md">
                                <table id="table-{{ Str::slug($full_name) }}" class="table-auto w-full border-collapse">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="border border-gray-600 px-4 py-3">ID</th>
                                            <th class="border border-gray-600 px-4 py-3">Requirement Type</th>
                                            <th class="border border-gray-600 px-4 py-3">Files</th>
                                            <th class="border border-gray-600 px-4 py-3">Submitted At</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-900 text-white">
                                        @foreach($requirements as $index => $requirement)
                                            <tr class="hover:bg-gray-700 transition duration-200">
                                                @if($index === 0)
                                                    <td class="border border-gray-600 px-4 py-3 font-semibold" rowspan="{{ count($requirements) }}">
                                                        {{ $requirement->id }}
                                                    </td>
                                                @endif
                                                <td class="border border-gray-600 px-4 py-3">{{ ucfirst($requirement->requirement_type) }}</td>
                                                <td class="border border-gray-600 px-4 py-3">
                                                    @if(is_array($requirement->files))
                                                        @foreach($requirement->files as $file)
                                                            <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-400 hover:text-blue-300 underline transition duration-200">View File</a><br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="border border-gray-600 px-4 py-3">{{ $requirement->created_at->format('Y-m-d H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-300 text-lg font-light">No requirements submitted yet.</p>
                    @endforelse

                    <!-- Pagination Links -->
                    <div class="mt-6 flex justify-center">
                        {{ $groupedRequirements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
