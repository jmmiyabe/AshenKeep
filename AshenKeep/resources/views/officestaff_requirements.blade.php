<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Manage Requirements</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Type</th>
                    <th class="border border-gray-300 px-4 py-2">Files</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Date and Time</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
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
                        <td class="border border-gray-300 px-4 py-2">{{ $requirement->updated_at->format('Y-m-d H:i:s') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('updateStatus', $requirement->id) }}" method="POST">
                                @csrf
                                <select name="status" class="border border-gray-300 rounded px-3 py-1">
                                    <option value="approved">Approve</option>
                                    <option value="rejected">Reject</option>
                                </select>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border border-gray-300 px-4 py-2 text-center">No pending requirements.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
