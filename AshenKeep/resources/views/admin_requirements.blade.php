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
                        <!-- Requirements Table Section -->
                        <div class="overflow-auto border border-black bg-[#102A45] text-white rounded-lg p-6 mx-6">
                            <h3 class="text-2xl font-semibold mb-6 text-white">Review Requirements</h3>
                            <table class="table-fixed w-full divide-y divide-gray-200 text-center border-collapse border-separate border-spacing-y-2 rounded-md overflow-hidden">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Format</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="AdminReqTable" class="bg-white text-black shadow-lg rounded-xl p-6 mt-6">
                                    <!-- Requirements added dynamically -->
                                </tbody>
                            </table>
                            <!-- Pagination Controls -->
                            <div class="flex justify-between mt-4">
                                <button onclick="previousPage()" class="bg-blue-500 text-white px-4 py-2 rounded" id="prevBtn">Previous</button>
                                <button onclick="nextPage()" class="bg-blue-500 text-white px-4 py-2 rounded" id="nextBtn">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const pageSize = 15; // Number of items per page
        let currentPage = 1;

        // Sample data (Replace with your actual data)
        const adminRequirementsData = JSON.parse(localStorage.getItem("adminRequirementsData")) || [];

        // Function to handle pagination
        function populateAdminTable() {
            const tableBody = document.getElementById("AdminReqTable");
            tableBody.innerHTML = ""; // Clear existing rows

            // Calculate the range for the current page
            const startIndex = (currentPage - 1) * pageSize;
            const endIndex = startIndex + pageSize;
            const paginatedData = adminRequirementsData.slice(startIndex, endIndex);

            // Populate table with current page data
            paginatedData.forEach(req => {
                const row = `
                    <tr>
                        <td>${req.id}</td>
                        <td>${req.name}</td>
                        <td>${req.type}</td>
                        <td>${req.format}</td>
                        <td>${req.date}</td>
                        <td>${req.time}</td>
                        <td>${req.status}</td>
                        <td>
                            <button 
                                onclick="issueProofOwnership()" 
                                class="bg-green-500 text-white px-4 py-2 rounded">
                                Issue Proof
                            </button>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            // Disable/Enable pagination buttons
            document.getElementById("prevBtn").disabled = currentPage === 1;
            document.getElementById("nextBtn").disabled = currentPage * pageSize >= adminRequirementsData.length;
        }

        // Go to the next page
        function nextPage() {
            if (currentPage * pageSize < adminRequirementsData.length) {
                currentPage++;
                populateAdminTable();
            }
        }

        // Go to the previous page
        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                populateAdminTable();
            }
        }

        // Handle issuing proof of ownership
        function issueProofOwnership() {
            const allApproved = adminRequirementsData.every(req => req.status === "Approved");

            if (allApproved) {
                alert("All requirements approved. Proof of ownership issued.");
                localStorage.removeItem("adminRequirementsData"); // Clear data
            } else {
                alert("Pending requirements exist. Cannot issue proof.");
            }
        }

        // Initialize table population on DOM load
        document.addEventListener("DOMContentLoaded", populateAdminTable);
    </script>
</x-app-layout>
