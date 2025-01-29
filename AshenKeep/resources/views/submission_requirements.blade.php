<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Submit Requirements</h2>

        <form action="{{ route('submission_requirements') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="requirementsForm">
            @csrf

            <div>
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <!-- Requirement 1 -->
            <div class="space-y-4 mb-4">
                <div>
                    <label for="requirement_type_1" class="block text-gray-700">Requirement Type</label>
                    <select name="requirement_type[]" id="requirement_type_1" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="" disabled selected>Select Requirement Type</option>
                        <option value="baptism">Baptism</option>
                        <option value="id">ID</option>
                        <option value="certificate">Certificate</option>
                    </select>
                </div>
                <div>
                    <label for="file_1" class="block text-gray-700">Upload File</label>
                    <input type="file" name="files[]" id="file_1" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <small class="text-gray-500">You can upload up to 5MB.</small>
                </div>
            </div>

            <!-- Requirement 2 -->
            <div class="space-y-4 mb-4">
                <div>
                    <label for="requirement_type_2" class="block text-gray-700">Requirement Type</label>
                    <select name="requirement_type[]" id="requirement_type_2" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="" disabled selected>Select Requirement Type</option>
                        <option value="baptism">Baptism</option>
                        <option value="id">ID</option>
                        <option value="certificate">Certificate</option>
                    </select>
                </div>
                <div>
                    <label for="file_2" class="block text-gray-700">Upload File</label>
                    <input type="file" name="files[]" id="file_2" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <small class="text-gray-500">You can upload up to 5MB.</small>
                </div>
            </div>

            <!-- Requirement 3 (you can add more similar blocks as needed) -->
            <div class="space-y-4 mb-4">
                <div>
                    <label for="requirement_type_3" class="block text-gray-700">Requirement Type</label>
                    <select name="requirement_type[]" id="requirement_type_3" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="" disabled selected>Select Requirement Type</option>
                        <option value="baptism">Baptism</option>
                        <option value="id">ID</option>
                        <option value="certificate">Certificate</option>
                    </select>
                </div>
                <div>
                    <label for="file_3" class="block text-gray-700">Upload File</label>
                    <input type="file" name="files[]" id="file_3" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <small class="text-gray-500">You can upload up to 5MB.</small>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Submit</button>
        </form>
    </div>
</x-app-layout>
