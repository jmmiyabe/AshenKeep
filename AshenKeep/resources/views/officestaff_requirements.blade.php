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
                        <!-- Manage Requirements Section -->
                        <div class="overflow-auto border border-black bg-[#102A45] text-white rounded-lg p-6 mx-6">
                            <h3 class="text-2xl font-semibold mb-6 text-white">Manage Requirements</h3>
                            <table class="table-fixed w-full divide-y divide-gray-200 text-center border-collapse border-separate border-spacing-y-2 rounded-md overflow-hidden">
                                <thead class="bg-[#102A45] w-full">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="OfficeReqTable" class="auto-rows-auto bg-white text-black">
                                    <!-- Grouped requirements will be populated here -->
                                </tbody>
                            </table>
                            <!-- Pagination Controls -->
                            <div class="mt-4 flex justify-between">
                                <button id="prevPage" onclick="changePage(-1)" class="bg-blue-500 text-white px-4 py-2 rounded disabled:opacity-50" disabled>Previous</button>
                                <button id="nextPage" onclick="changePage(1)" class="bg-blue-500 text-white px-4 py-2 rounded">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const submittedRequirementsData = [
            { id: 1, name: "John", type: "Birth Certificate", format: "PDF", date: "2025-01-01", time: "10:00 AM", status: "Pending" },
            { id: 2, name: "John", type: "Baptism Certificate", format: "PDF", date: "2025-01-02", time: "11:00 AM", status: "Pending" },
            { id: 3, name: "John", type: "Marriage Certificate", format: "PDF", date: "2025-01-03", time: "12:00 PM", status: "Pending" },
            { id: 4, name: "Ken", type: "Birth Certificate", format: "PDF", date: "2025-01-01", time: "10:00 AM", status: "Pending" },
            { id: 5, name: "Ken", type: "Baptism Certificate", format: "PDF", date: "2025-01-02", time: "11:00 AM", status: "Pending" },
            { id: 6, name: "Ken", type: "Marriage Certificate", format: "PDF", date: "2025-01-03", time: "12:00 PM", status: "Pending" },
        ];

        const itemsPerPage = 15; // Number of items per page
        let currentPage = 0;

        // Function to populate the table
        function populateRequirementsTable() {
            const tableBody = document.getElementById("OfficeReqTable");
            tableBody.innerHTML = "";

            // Group requirements by name
            const groupedData = submittedRequirementsData.reduce((acc, req) => {
                if (!acc[req.name]) acc[req.name] = [];
                acc[req.name].push(req);
                return acc;
            }, {});

            // Get current page's data
            const currentData = paginateData(groupedData);

            // Populate table with grouped data
            Object.entries(currentData).forEach(([name, requirements], index) => {
                const parentRow = `
                    <tr class="bg-gray-200">
                        <td>${index + 1}</td>
                        <td>${name}</td>
                        <td>
                            <button onclick="toggleDropdown(${index})" class="bg-blue-500 w-48 text-white px-4 py-2 rounded">
                                View Requirements
                            </button>
                        </td>
                    </tr>
                    <tr id="dropdown-${index}" class="hidden">
                        <td colspan="3">
                            <table class="w-full bg-gray-100 text-black">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Format</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${requirements.map(req => `
                                        <tr>
                                            <td>${req.type}</td>
                                            <td>${req.format}</td>
                                            <td>${req.date}</td>
                                            <td>${req.time}</td>
                                            <td id="status-${req.id}">${req.status}</td>
                                            <td>
                                                <button onclick="updateStatus(${req.id}, 'approved')" class="bg-green-500 px-4 py-2 rounded">Approve</button>
                                                <button onclick="updateStatus(${req.id}, 'rejected')" class="bg-red-500 px-4 py-2 rounded">Reject</button>
                                                <a href="${req.fileUrl}" target="_blank" class="bg-yellow-500 px-4 py-2 rounded">View File</a>
                                                <a href="${req.fileUrl}" download class="bg-yellow-500 px-4 py-2 rounded">Download</a>
                                            </td>
                                        </tr>
                                    `).join("")}
                                </tbody>
                            </table>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += parentRow;
            });

            // Update pagination buttons
            document.getElementById("prevPage").disabled = currentPage === 0;
            document.getElementById("nextPage").disabled = currentPage >= Math.ceil(submittedRequirementsData.length / itemsPerPage) - 1;
        }

        // Function to paginate the data
        function paginateData(data) {
            const dataArray = Object.entries(data);
            const startIndex = currentPage * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            return Object.fromEntries(dataArray.slice(startIndex, endIndex));
        }

        // Change page function
        function changePage(direction) {
            currentPage += direction;
            populateRequirementsTable();
        }

        // Toggle visibility of dropdown rows
        function toggleDropdown(index) {
            const dropdown = document.getElementById(`dropdown-${index}`);
            dropdown.classList.toggle("hidden");
        }

        // Update the status of a requirement
        function updateStatus(id, status) {
            const req = submittedRequirementsData.find(r => r.id === id);
            if (req) {
                req.status = status.charAt(0).toUpperCase() + status.slice(1);
                document.getElementById(`status-${id}`).textContent = req.status;
            }
        }

        // Initialize the table on page load
        document.addEventListener("DOMContentLoaded", populateRequirementsTable);
    </script>
</x-app-layout>
