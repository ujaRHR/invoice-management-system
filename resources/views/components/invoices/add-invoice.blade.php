<div class="p-3 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-2">
            <nav class="flex mb-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/dashboard" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="/invoices" class="ml-1 text-gray-500 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Invoices</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="#" class="ml-1 text-gray-500 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Create Invoice</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="min-h-screen bg-gray-100 p-10">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-5xl mx-auto space-y-6">
        <!-- Header Section -->
        <header class="text-center border-b pb-4">
            <img src="{{ asset('images/logo.svg') }}" alt="DySiQ Logo" class="w-25 h-25 mx-auto mb-2">
        </header>

        <!-- Invoice Details Section -->
        <section class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">Invoice Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Invoice ID</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="#INV-1001" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Issue Date</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <div class="relative max-w-sm">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Due Date</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker id="datepicker-inline" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Enter or select a date">
                </div>

            </div>
        </section>

        <!-- Client Information Section -->
        <section class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">Client Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Select Client</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="updateClientInfo()">
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                        <option value="3">Michael Johnson</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Business Name</label>
                    <input type="text" id="business-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="client-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Country</label>
                    <input type="text" id="client-country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                </div>
            </div>
        </section>

        <!-- Service and Pricing Section -->
        <section class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">Service and Pricing</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Select Service</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="updateServicePrice()">
                        <option value="100">Web Development - $100</option>
                        <option value="200">Graphic Design - $200</option>
                        <option value="300">SEO Optimization - $300</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Unit Price</label>
                    <input type="text" id="unit-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Quantity</label>
                    <input type="number" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="1" min="1" oninput="calculateTotal()">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tax (%)</label>
                    <input type="number" id="tax" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="0" min="0" oninput="calculateTotal()">
                </div>
            </div>
            <div class="text-xl font-bold text-gray-700 bg-green-100 p-4 rounded-lg flex justify-between">
                <span>Total:</span>
                <span id="grand-total">$0.00</span>
            </div>
        </section>

        <!-- Payment and Notes Section -->
        <section class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">Payment and Notes</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Payment Method</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>Bank Transfer</option>
                        <option>Credit Card</option>
                        <option>PayPal</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Additional Notes</label>
                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="3"></textarea>
                </div>
            </div>
        </section>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button class="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg hover:bg-green-600 transition duration-300 flex items-center gap-2" aria-label="Generate Invoice">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="#ffffff">
                        <path d="m12 2l.117.007a1 1 0 0 1 .876.876L13 3v4l.005.15a2 2 0 0 0 1.838 1.844L15 9h4l.117.007a1 1 0 0 1 .876.876L20 10v9a3 3 0 0 1-2.824 2.995L17 22H7a3 3 0 0 1-2.995-2.824L4 19V5a3 3 0 0 1 2.824-2.995L7 2zm4 15h-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0-2m0-4H8a1 1 0 0 0 0 2h8a1 1 0 0 0 0-2M9 6H8a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2" />
                        <path d="M19 7h-4l-.001-4.001z" />
                    </g>
                </svg>
                Generate Invoice
            </button>
        </div>
    </div>
</div>


<script>
    function updateClientInfo() {
        const clients = {
            1: {
                businessName: "Doe Enterprises",
                email: "john.doe@example.com",
                country: "USA"
            },
            2: {
                businessName: "Smith Co.",
                email: "jane.smith@example.com",
                country: "Canada"
            },
            3: {
                businessName: "Johnson Ltd.",
                email: "michael.johnson@example.com",
                country: "UK"
            }
        };
        const selectedClientId = document.querySelector('select').value;
        const client = clients[selectedClientId];
        document.getElementById('business-name').value = client.businessName;
        document.getElementById('client-email').value = client.email;
        document.getElementById('client-country').value = client.country;
    }
</script>