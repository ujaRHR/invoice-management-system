<div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-10">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-5xl mx-auto space-y-6 mt-[-20px]">
        <!-- Header Section -->
        <header class="text-center border-b dark:border-gray-700 pb-4">
            <img src="{{ asset('images/logo.svg') }}" alt="DySiQ Logo" class="w-25 h-25 mx-auto mb-2">
        </header>

        <form id="invoiceForm">
            <!-- Invoice Details Section -->
            <section class="space-y-4 pb-5">
                <h3 class="text-base font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <g fill="#21a262">
                            <path d="m12 2l.117.007a1 1 0 0 1 .876.876L13 3v4l.005.15a2 2 0 0 0 1.838 1.844L15 9h4l.117.007a1 1 0 0 1 .876.876L20 10v9a3 3 0 0 1-2.824 2.995L17 22H7a3 3 0 0 1-2.995-2.824L4 19V5a3 3 0 0 1 2.824-2.995L7 2zm4 15h-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0-2m0-4H8a1 1 0 0 0 0 2h8a1 1 0 0 0 0-2M9 6H8a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2" />
                            <path d="M19 7h-4l-.001-4.001z" />
                        </g>
                    </svg>
                    <span class="text-lg">Invoice Details</span>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Invoice ID</label>
                        <input type="text" id="invoiceNo" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="" readonly>
                    </div>
                    <div class="relative max-w-sm">
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Issue Date</label>
                        <div class="absolute top-[25px] bottom-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="issueDate" datepicker datepicker-autohide datepicker-buttons datepicker-autoselect-today datepicker-format="dd-mm-yyyy" type="text" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date" required>
                    </div>
                    <div class="relative max-w-sm">
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Due Date</label>
                        <div class="absolute top-[25px] bottom-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="dueDate" datepicker datepicker-autohide datepicker-buttons datepicker-autoselect-today datepicker-format="dd-mm-yyyy" type="text" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date" required onchange="validateDates()">
                    </div>
                </div>
            </section>
            <!-- Client Information Section -->
            <section class="space-y-4 pb-5">
                <h3 class="text-base font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#21a262" fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8a4 4 0 0 0 0-8m-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4zm7.25-2.095c.478-.86.75-1.85.75-2.905a6 6 0 0 0-.75-2.906a4 4 0 1 1 0 5.811M15.466 20c.34-.588.535-1.271.535-2v-1a5.98 5.98 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-lg">Client Information</span>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Select Client</label>
                        <select id="clientsList" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="getClientInfo()" required>
                            <option value="" disabled selected>Select Client</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Business Name</label>
                        <input type="text" id="clientBusinessName" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Email</label>
                        <input type="email" id="clientEmail" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Country</label>
                        <input type="text" id="clientCountry" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly required>
                    </div>
                </div>
            </section>
            <!-- Service and Pricing Section -->
            <section class="space-y-4 pb-5">
                <h3 class="text-base font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#21a262" d="m8.8 10.95l2.15-2.175l-1.4-1.425l-.4.4q-.275.275-.687.288T7.75 7.75t-.3-.712t.3-.713l.375-.375L7 4.825L4.825 7zm8.2 8.225L19.175 17l-1.125-1.125l-.4.375q-.3.3-.7.3t-.7-.3t-.3-.7t.3-.7l.375-.4l-1.425-1.4l-2.15 2.15zm-.775-12.75l1.4 1.4l1.4-1.4L17.6 5zM4 21q-.425 0-.712-.288T3 20v-2.825q0-.2.075-.387t.225-.338l4.075-4.075L3.05 8.05Q2.625 7.625 2.625 7t.425-1.05l2.9-2.9q.425-.425 1.05-.412t1.05.437L12.4 7.4l3.775-3.8q.3-.3.675-.45t.775-.15t.775.15t.675.45L20.4 4.95q.3.3.45.675T21 6.4t-.15.763t-.45.662l-3.775 3.8l4.325 4.325q.425.425.425 1.05t-.425 1.05l-2.9 2.9q-.425.425-1.05.425t-1.05-.425l-4.325-4.325L7.55 20.7q-.15.15-.337.225T6.825 21z" />
                    </svg>
                    <span class="text-lg">Service and Pricing</span>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Select Service</label>
                        <select id="servicesList" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="getServiceInfo()" required>
                            <option value="" disabled selected>Select Service</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Unit Price</label>
                        <input type="number" id="unitPrice" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="calculateTotal()" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Quantity</label>
                        <input type="number" id="quantity" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="1" min="1" max="5" oninput="calculateTotal()" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Tax (%)</label>
                        <input type="number" id="tax" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="0" min="0" oninput="calculateTotal()" required>
                    </div>
                </div>
                <div class="text-xl font-bold text-gray-700 dark:text-gray-300 bg-green-100 dark:bg-green-900 p-4 rounded-lg flex justify-between">
                    <span>Total:</span>
                    <span id="grandTotal">$0.00</span>
                </div>
            </section>
            <!-- Payment and Notes Section -->
            <section class="space-y-4">
                <h3 class="text-base font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#21a262" d="M14.356 2.595a.25.25 0 0 1 .361-.032l.922.812L12.739 7h1.92l2.106-2.632l1.652 1.457a.25.25 0 0 1 .026.348l-.69.827h1.944a1.75 1.75 0 0 0-.288-2.3l-3.7-3.263a1.75 1.75 0 0 0-2.531.23L8.976 7h1.91zM5.25 6.5a.75.75 0 0 0 0 1.5h13a3.25 3.25 0 0 1 3.25 3.25v6.5A3.25 3.25 0 0 1 18.25 21h-12A3.25 3.25 0 0 1 3 17.75V7.25A2.25 2.25 0 0 1 5.25 5h4.32L8.378 6.5zm10.25 8.25c0 .414.336.75.75.75h2a.75.75 0 0 0 0-1.5h-2a.75.75 0 0 0-.75.75" />
                    </svg>
                    <span class="text-lg">Payment and Notes</span>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Payment Method</label>
                        <select id="methodsList" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="getMethodInfo()" required>
                            <option value="" selected disabled>Select Payment Method</option>
                        </select>

                        <div class=" mt-2 p-3 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-800 dark:text-red-300 rounded-lg flex items-start gap-2">
                            <svg class="w-5 h-5 text-red-700 dark:text-red-300 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12 2a10 10 0 1 1-10 10A10 10 0 0 1 12 2Zm0 12.75a.75.75 0 0 0-.75.75v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-.75-.75ZM12 6.75a.75.75 0 0 0-.75.75v4.5a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75Z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm" id="methodInfo">
                                Please check your payment details carefully before proceeding, especially for bank transfers.
                            </p>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Additional Notes</label>
                        <textarea class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="3">We appreciate your prompt payment. If you have any questions regarding this invoice, please feel free to reach out to me...</textarea>
                    </div>
                </div>
            </section>

            <div class="flex justify-end">
                <button class="px-6 py-3 bg-green-500 dark:bg-green-700 text-white text-lg font-semibold rounded-lg hover:bg-green-600 dark:hover:bg-green-800 transition duration-300 flex items-center gap-2" aria-label="Generate Invoice" onsubmit="createService()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#ffffff" d="m23.5 17l-5 5l-3.5-3.5l1.5-1.5l2 2l3.5-3.5zM6 2c-1.11 0-2 .89-2 2v16c0 1.11.89 2 2 2h7.81c-.53-.91-.81-1.95-.81-3c0-3.31 2.69-6 6-6c.34 0 .67.03 1 .08V8l-6-6m-1 1.5L18.5 9H13Z" />
                    </svg>
                    Generate Invoice
                </button>
            </div>
        </form>
    </div>
</div>


@push('other-scripts')
<script>
    generateInvoiceNo()
    getClients()
    getServices()
    getMethods()

    async function generateInvoiceNo() {
        const timestamp = Date.now() % 100000;
        const randomNumber = Math.floor(Math.random() * 1000);
        const invoiceNumber = (timestamp * 1000 + randomNumber).toString().padStart(8, '0');

        $('#invoiceNo').val(invoiceNumber)
    }

    async function getClients() {
        try {
            let res = await axios.get('/get-clients');
            let data = res.data.clients;

            let clientsList = $('#clientsList');

            data.forEach(function(item) {
                let newOption = `<option data-id="${item['id']}" value="${item['fullname']}">${item['fullname']}</option>`;
                clientsList.append(newOption);
            });
        } catch (error) {
            console.error("Error fetching client info:", error);
        }
    }

    async function getServices() {
        try {
            let res = await axios.get('/get-services');
            let data = res.data.services;

            let servicesList = $('#servicesList');

            data.forEach(function(item) {
                let newOption = `<option data-id="${item['id']}" value="${item['service_name']}">${item['service_name']}</option>`;
                servicesList.append(newOption);
            });
        } catch (error) {
            console.error("Error fetching service info:", error);
        }
    }

    async function getMethods() {
        try {
            let res = await axios.get('/get-methods');
            let data = res.data.methods;

            let methodsList = $('#methodsList');

            data.forEach(function(item) {
                let newOption = `<option data-id="${item['id']}" value="${item['provider']}">${item['method_type'].charAt(0).toUpperCase() + item['method_type'].slice(1)} (${item['provider']})</option>`;
                methodsList.append(newOption);
            });
        } catch (error) {
            console.error("Error fetching method info:", error);
        }
    }

    async function getClientInfo() {
        let clientId = $('#clientsList').find(':selected').data('id');

        axios.post('/client-info', {
            id: clientId
        }).then(function(response) {
            $('#clientBusinessName').val(response.data.client.company)
            $('#clientEmail').val(response.data.client.email)
            $('#clientCountry').val(response.data.client.country)
        })
    }

    async function getServiceInfo() {
        let serviceId = $('#servicesList').find(':selected').data('id');

        axios.post('/service-info', {
            id: serviceId
        }).then(function(response) {
            $('#unitPrice').val(response.data.service.base_price)
            calculateTotal()
        })
    }

    async function getMethodInfo() {
        let methodId = $('#methodsList').find(':selected').data('id');

        axios.post('/method-info', {
            id: methodId
        }).then(function(response) {
            $('#methodInfo').text(response.data.method.account_details)
        })
    }

    async function calculateTotal() {
        let unitPrice = parseFloat($('#unitPrice').val()) || 0;
        let quantity = parseInt($('#quantity').val()) || 1;
        let taxPercent = parseFloat($('#tax').val()) || 0;

        let subtotal = unitPrice * quantity;
        let taxAmount = (subtotal * taxPercent) / 100;
        let total = subtotal + taxAmount;

        $('#grandTotal').text(total.toFixed(2));
    }

    async function createInvoice() {
        event.preventDefault();

        const formData = {
            'client_id': $('#clientsList').find(':selected').data('id'),
            'invoice_number': $('#invoiceNo').val(),
            'service_id': $('#servicesList').find(':selected').data('id'),
            'quantity': $('#quantity').val(),
        };

        try {
            const response = await axios.post('/create-service', formData);

            if (response.status === 200 && response.data.success === true) {
                toastr.success("Service created successfully!");
                $('#addServiceBtn').click()
                const addModal = document.getElementById('add-service-modal');
                const addModalInstance = new Modal(addModal);
                addModalInstance.hide();
                $('[modal-backdrop]').remove();
                getServices();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        } catch (error) {
            toastr.error("An error occurred while creating the service.");
        }
    }
</script>
@endpush