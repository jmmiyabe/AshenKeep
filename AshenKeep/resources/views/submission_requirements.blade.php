<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Submit Requirements</h2>

        <form action="{{ route('submission_requirements') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="full_name" class="block text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label for="requirement_type" class="block text-gray-700">Requirement Type</label>
                <select name="requirement_type" id="requirement_type" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="" disabled selected>Select Requirement Type</option>
                    <option value="Baptism">Baptism</option>
                    <option value="PSA">PSA</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div>
                <label for="files" class="block text-gray-700">Upload Files</label>
                <input type="file" name="files[]" id="files" multiple class="w-full border border-gray-300 rounded px-3 py-2" required>
                <small class="text-gray-500">You can upload up to 5 files (max 5MB each).</small>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</x-app-layout>