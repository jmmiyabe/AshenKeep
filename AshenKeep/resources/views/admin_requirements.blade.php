<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Issue Proof Ownership</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        @foreach($groupedRequirements as $applicantName => $requirements)
            <div class="mb-8 border border-gray-300 rounded p-4">
                <h3 class="text-lg font-semibold">Applicant: {{ $applicantName }}</h3>

                <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Type</th>
                            <th class="border border-gray-300 px-4 py-2">Files</th>
                            <th class="border border-gray-300 px-4 py-2">Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requirements as $requirement)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($requirement->requirement_type) }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @foreach($requirement->files as $file)
                                        <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-500 underline">View File</a><br>
                                    @endforeach
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $requirement->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{ route('issue_proof', $applicantName) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        Issue Proof of Ownership
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
