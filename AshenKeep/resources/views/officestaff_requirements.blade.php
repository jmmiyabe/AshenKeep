<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Manage Requirements</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        @foreach($groupedRequirements as $applicantName => $requirements)
            <div class="mb-8 border border-gray-300 rounded p-4" x-data="{open: false}">
                <button @click="open = !open" class="w-full text-left text-lg font-semibold text-gray-800 bg-gray-200 p-3 rounded">
                    {{ $applicantName }}
                </button>

                <div x-show="open" x-cloak class="mt-4">
                    <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Type</th>
                                <th class="border border-gray-300 px-4 py-2">Files</th>
                                <th class="border border-gray-300 px-4 py-2">Date Submitted</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requirements as $requirement)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300">
                                        {{ $requirement->id }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300">
                                        {{ ucfirst($requirement->requirement_type) }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300">
                                        @foreach($requirement->files as $file)
                                            <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-500 hover:underline">
                                                View File
                                            </a><br>
                                        @endforeach
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300">
                                        {{ $requirement->created_at->format('Y-m-d H:i') }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300">
                                        <span class="text-sm {{ $requirement->status == 'pending' ? 'text-yellow-500' : ($requirement->status == 'approved' ? 'text-green-500' : 'text-red-500') }}">
                                            {{ ucfirst($requirement->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('batch_update_status') }}" method="POST" class="mt-4 flex justify-end">
                        @csrf
                        <input type="hidden" name="name" value="{{ $applicantName }}">

                        <button type="submit" name="status" value="approved"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition duration-200">
                            Approve All
                        </button>
                        <button type="submit" name="status" value="rejected"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 ml-2 transition duration-200">
                            Reject All
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
