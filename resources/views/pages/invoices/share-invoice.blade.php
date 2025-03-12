<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $invoice->invoice_number }} | DySiQ Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-gray-100 dark:bg-gray-900 p-6">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-5xl mx-auto space-y-8">
        <!-- Header Section -->
        <header class="text-center border-b border-gray-200 dark:border-gray-700 pb-6">
            <img src="{{ asset('images/logo.svg') }}" alt="DySiQ Logo" class="w-25 h-25 mx-auto mb-4">
            <p class="text-lg text-gray-600 dark:text-gray-300">From {{ $invoice->customer->fullname }}</p>
        </header>

        <!-- Invoice Details Section -->
        <section class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Invoice Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Invoice ID:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">#{{ $invoice->invoice_number }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Issue Date:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ explode(' ', $invoice->issue_date)[0] }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Due Date:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ explode(' ', $invoice->due_date)[0] }}</p>
                </div>
            </div>
        </section>

        <!-- Client Information Section -->
        <section class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Client Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Client Name:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->client->fullname }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Business Name:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->client->company }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Email:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->client->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Country:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->client->country }}</p>
                </div>
            </div>
        </section>

        <!-- Service and Pricing Section -->
        <section class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Service and Pricing</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Service:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->service->service_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Unit Price:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">${{ $invoice->unit_price }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Quantity:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->quantity }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tax (%):</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ number_format(($invoice->tax / $invoice->amount) * 100, 2) }}%</p>
                </div>
            </div>
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-lg p-4 text-center">
                <p class="text-xl font-bold text-green-800 dark:text-green-200">Total: <span>${{ $invoice->total_amount }}</span></p>
            </div>
        </section>

        <!-- Payment and Notes Section -->
        <section class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Payment and Notes</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Payment Method:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ ucwords($invoice->paymentMethod->method_type) }} ({{ $invoice->paymentMethod->provider }})</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->paymentMethod->account_details }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Additional Notes:</p>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $invoice->notes }}</p>
                </div>
            </div>
        </section>

        <!-- Download Button -->
        <div class="flex justify-end">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300" onclick="window.print();">
                Download PDF
            </button>
        </div>
    </div>
</body>

</html>