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


<!-- Invoice Form -->
<div class="p-8 bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white shadow-2xl rounded-lg p-8 max-w-3xl w-full">
        <h2 class="text-3xl font-bold mb-6 text-gray-700 text-center flex items-center justify-center gap-2">
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m0 18H5m4 0h4m4 0V3m0 18h4m-4 0h4"></path>
            </svg>
            Invoice Creation
        </h2>

        <!-- Client Information -->
        <div class="mb-6">
            <label class="block text-gray-600 mb-2 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.656 0 3-1.344 3-3s-1.344-3-3-3-3 1.344-3 3 1.344 3 3 3zM21 20v-1c0-2-4-3-9-3s-9 1-9 3v1"></path>
                </svg>
                Select Client
            </label>
            <select class="w-full p-3 border rounded-lg bg-white shadow-sm focus:ring-2 focus:ring-green-500">
                <option>John Doe</option>
                <option>Jane Smith</option>
                <option>Michael Johnson</option>
            </select>
        </div>

        <!-- Dates -->
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-gray-600 mb-2 font-semibold">Invoice Date</label>
                <input type="date" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-gray-600 mb-2 font-semibold">Due Date</label>
                <input type="date" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <!-- Service Details -->
        <div class="mb-6">
            <label class="block text-gray-600 mb-2 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3 3V9m-7 12h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                Select Service
            </label>
            <select class="w-full p-3 border rounded-lg bg-white shadow-sm focus:ring-2 focus:ring-green-500" onchange="calculateTotal()">
                <option value="100">Web Development - $100</option>
                <option value="200">Graphic Design - $200</option>
                <option value="300">SEO Optimization - $300</option>
            </select>
        </div>

        <!-- Tax & Total -->
        <div class="mb-6">
            <label class="block text-gray-600 mb-2 font-semibold">Tax (%)</label>
            <input type="number" id="tax" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500" value="0" oninput="calculateTotal()">
        </div>
        <div class="text-2xl font-bold text-gray-700 bg-green-100 p-4 rounded-lg flex justify-between">
            <span>Total:</span>
            <span id="grand-total">$0.00</span>
        </div>

        <!-- Payment Method -->
        <div class="mt-6">
            <label class="block text-gray-600 mb-2 font-semibold">Payment Method</label>
            <select class="w-full p-3 border rounded-lg bg-white shadow-sm focus:ring-2 focus:ring-green-500">
                <option>Bank Transfer</option>
                <option>Credit Card</option>
                <option>PayPal</option>
            </select>
        </div>

        <!-- Additional Notes -->
        <div class="mt-6">
            <label class="block text-gray-600 mb-2 font-semibold">Additional Notes</label>
            <textarea class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500" rows="4"></textarea>
        </div>

        <button class="mt-6 w-full px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg hover:bg-green-600 transition duration-300 flex items-center justify-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 0v4m0-4h4m-4 0H8m8-6H8a4 4 0 00-4 4v8a4 4 0 004 4h8a4 4 0 004-4v-8a4 4 0 00-4-4z"></path>
            </svg>
            Generate Invoice
        </button>
    </div>
</div>

<script>
    function calculateTotal() {
        let servicePrice = document.querySelector('select').value;
        let tax = document.getElementById('tax').value;
        let grandTotal = parseFloat(servicePrice) + (parseFloat(servicePrice) * tax / 100);
        document.getElementById('grand-total').innerText = `$${grandTotal.toFixed(2)}`;
    }
</script>