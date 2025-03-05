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
<div class="p-6 space-y-8">
    <!-- Header -->
    <header class="text-center">
        <h1 class="text-3xl font-bold text-gray-800">Create Invoice</h1>
        <p class="text-sm text-gray-500">Fill in the details below to generate your invoice.</p>
    </header>

    <!-- Client Information -->
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Client Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="clientName" class="block text-sm font-medium text-gray-600">Client Name</label>
                <input type="text" id="clientName" placeholder="Enter client name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="clientEmail" class="block text-sm font-medium text-gray-600">Client Email</label>
                <input type="email" id="clientEmail" placeholder="Enter client email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Service Details</h2>
        <div id="serviceRows" class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex-grow mr-4">
                    <label class="block text-sm font-medium text-gray-600">Service Name</label>
                    <input type="text" placeholder="Enter service name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="w-24">
                    <label class="block text-sm font-medium text-gray-600">Quantity</label>
                    <input type="number" placeholder="Qty" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="w-32">
                    <label class="block text-sm font-medium text-gray-600">Rate ($)</label>
                    <input type="number" placeholder="Rate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button class="ml-4 mt-6 text-red-500 hover:text-red-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.618L9.894 2.553A1 1 0 009 2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <button id="addServiceRow" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add Service
        </button>
    </section>

    <!-- Tax and Total -->
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tax and Total</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="taxRate" class="block text-sm font-medium text-gray-600">Tax Rate (%)</label>
                <input type="number" id="taxRate" placeholder="Enter tax rate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="totalAmount" class="block text-sm font-medium text-gray-600">Total Amount ($)</label>
                <input type="text" id="totalAmount" readonly placeholder="Calculated total" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-500 sm:text-sm">
            </div>
        </div>
    </section>

    <!-- Payment Method -->
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Payment Method</h2>
        <div class="space-y-4">
            <div class="flex items-center">
                <input type="radio" id="creditCard" name="paymentMethod" value="creditCard" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                <label for="creditCard" class="ml-3 block text-sm font-medium text-gray-700">Credit Card</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="bankTransfer" name="paymentMethod" value="bankTransfer" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                <label for="bankTransfer" class="ml-3 block text-sm font-medium text-gray-700">Bank Transfer</label>
            </div>
        </div>
    </section>

    <!-- Additional Notes -->
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Additional Notes</h2>
        <textarea rows="4" placeholder="Enter any additional notes..." class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
    </section>

    <!-- Submit Button -->
    <footer class="text-center">
        <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Generate Invoice
        </button>
    </footer>
</div>

<script>
    // JavaScript for dynamic calculations
    document.getElementById('addServiceRow').addEventListener('click', function() {
        const serviceRows = document.getElementById('serviceRows');
        const newRow = `
        <div class="flex items-center justify-between">
          <div class="flex-grow mr-4">
            <label class="block text-sm font-medium text-gray-600">Service Name</label>
            <input type="text" placeholder="Enter service name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          <div class="w-24">
            <label class="block text-sm font-medium text-gray-600">Quantity</label>
            <input type="number" placeholder="Qty" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          <div class="w-32">
            <label class="block text-sm font-medium text-gray-600">Rate ($)</label>
            <input type="number" placeholder="Rate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          <button class="ml-4 mt-6 text-red-500 hover:text-red-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.618L9.894 2.553A1 1 0 009 2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      `;
        serviceRows.insertAdjacentHTML('beforeend', newRow);
    });

    // Calculate total amount dynamically
    document.addEventListener('input', function() {
        let total = 0;
        document.querySelectorAll('#serviceRows .flex').forEach(row => {
            const quantity = parseFloat(row.querySelector('.w-24 input').value) || 0;
            const rate = parseFloat(row.querySelector('.w-32 input').value) || 0;
            total += quantity * rate;
        });
        const taxRate = parseFloat(document.getElementById('taxRate').value) || 0;
        const totalWithTax = total + (total * (taxRate / 100));
        document.getElementById('totalAmount').value = totalWithTax.toFixed(2);
    });
</script>