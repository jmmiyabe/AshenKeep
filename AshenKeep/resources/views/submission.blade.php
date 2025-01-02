<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicant') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <!-- Sidebar -->
        <div class="hidden sm:flex">
            <x-dashboard-side-bar />
        </div>

        <!-- Main Content -->
        <div class="min-h-screen flex items-center px-8">
            <div class="absolute inset-0 h-25 mt-60 max-w-xl mx-auto bg-blue-900 p-6 rounded items-center">
                <h2 class="text-2xl font-semibold mb-6 text-white">Sumbit Your Requirements</h2>
                <form id="requirementsForm" method="POST" enctype="multipart/form-data" aciton="{{ route('submission') }}">
                    @csrf 
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" class="text-white" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div> 
                    <div class="mb-4">
                        <x-label for="file" value="{{ __('Attach a File') }}" class="text-white" />
                        <x-input id="file" class="block mt-1 w-full border border-yellow-300 rounded-lg" type="file" name="file" :value="old('file')" multiple/>
                    </div>
                    <x-apply-button class="bg-yellow-600 text-white text-start w-4 py-3 rounded mb-4 flex items-start justify-start gap-2 hover:bg-yellow-700">
                        Submit
                        <img src="./img/requirements_send.svg" alt="Send icon" class="w-6 h-6">
                    </x-apply-button>
                </form>
            </div>
        </div>
    </div>
    <script>
    //Submission Handler
    document.getElementById('requirementsForm').addEventListener('Submit', async function (e) {
        e.preventDefault();
        //Form Data
            cont formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('file', document.getElementById('file').files[0]);
            try {
                //Request to Laravel Backend
                    const response = await fetch('/submission', {
                        method: 'POST',
                        body: formData,
                    });
                    if (response.ok) {
                        // Show success message
                        Swal.fire({
                            title: 'Success!',
                            text: 'Your requirements have been successfully submitted.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Optionally clear the form
                        document.getElementById('requirementForm').reset();
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an issue submitting your requirements. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An unexpected error occurred.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
         });
    </script>    
</x-app-layout>
























        <!-- Main Container -->
        

</body>
</html>
