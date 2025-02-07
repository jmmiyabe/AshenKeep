<div class="flex-1">
    <div class="py-1 overflow-y-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-lg p-6">
                <div class="overflow-auto border border-gray-700 bg-[#102A45] text-white rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Issue Proof of Ownership</h2>

                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @foreach($groupedRequirements->groupBy('full_name') as $applicantName => $requirements)
                        <div class="mb-6" x-data="{ open: false }">
                            <button @click="open = !open" class="text-lg font-semibold text-white bg-gray-700 hover:bg-gray-600 transition duration-300 p-3 rounded-lg w-full text-left shadow-md flex justify-between items-center">
                                <span>{{ $applicantName }}</span>
                                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                </svg>
                            </button>

                            <div x-show="open" x-cloak class="mt-4 border border-gray-500 rounded-lg overflow-hidden shadow-md">
                                <table id="table-{{ Str::slug($applicantName) }}" class="table-auto w-full border-collapse border border-gray-200 mt-4">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2">ID</th>
                                            <th class="border border-gray-300 px-4 py-2">Type</th>
                                            <th class="border border-gray-300 px-4 py-2">Files</th>
                                            <th class="border border-gray-300 px-4 py-2">Date Submitted</th>
                                            <th class="border border-gray-300 px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-900 text-white">
                                        @foreach($requirements as $requirement)
                                            <tr class="hover:bg-gray-700 transition duration-200">
                                                <td class="border border-gray-300 px-4 py-2 text-white">
                                                    {{ $requirement->id }}
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2 text-white">
                                                    {{ ucfirst($requirement->requirement_type) }}
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2 text-white">
                                                    @if(is_array($requirement->files))
                                                        @foreach($requirement->files as $file)
                                                            <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-500 underline">View File</a><br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2 text-white">
                                                    {{ $requirement->created_at->format('Y-m-d H:i') }}
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2 text-white">
                                                    <span class="text-sm {{ $requirement->status == 'pending' ? 'text-yellow-500' : ($requirement->status == 'approved' ? 'text-green-500' : 'text-red-500') }}">
                                                        {{ ucfirst($requirement->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <form action="{{ route('issue_proof', $applicantName) }}" method="POST" class="mt-4">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition duration-200">
                                        Issue Proof of Ownership
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-4">
                        {{ $groupedRequirements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
