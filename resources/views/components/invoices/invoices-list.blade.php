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
                            <a href="#" class="ml-1 text-gray-500 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Invoices</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="flex flex-col px-[5px] pr-[5px]">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <table id="dataTable" class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-[#f3f3fe] dark:bg-gray-700">
                        <tr class="text-gray-700">
                            <th scope="col" class="hidden border border-gray-300 p-4 font-medium text-gray-500">
                                ID
                            </th>
                            <th scope="col" class="border border-gray-300 w-[9%] p-4 font-medium text-gray-500">
                                Invoice
                            </th>
                            <th scope="col" class="border border-gray-300 w-[17%] p-4 font-medium text-gray-500">
                                Client Name
                            </th>
                            <th scope="col" class="border border-gray-300 w-[21%] p-4 font-medium text-gray-500">
                                Service
                            </th>
                            <th scope="col" class="border border-gray-300 w-[8%] p-4 font-medium text-gray-500">
                                Amount
                            </th>
                            <th scope="col" class="border border-gray-300 w-[15%] p-4 font-medium text-gray-500">
                                Method
                            </th>
                            <th scope="col" class="border border-gray-300 w-[10%] p-4 font-medium text-gray-500">
                                Due Date
                            </th>
                            <th scope="col" class="border border-gray-300 w-[9%] p-4 font-medium text-gray-500">
                                Status
                            </th>
                            <th scope="col" class="border border-gray-300 w-[11%] p-4 font-medium text-gray-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('other-scripts')
<script>
    getInvoices();

    async function getInvoices() {
        let res = await axios.get('/get-invoices');
        let data = res.data.invoices;

        let mainTable = $('#dataTable');
        let tableBody = $('#tableBody');

        mainTable.DataTable().clear().destroy();

        const statusClasses = {
            cancelled: 'bg-red-200 text-red-800',
            paid: 'bg-green-200 text-green-800',
            pending: 'bg-orange-200 text-orange-800',
        };

        const status = {
            cancelled: 'CANCELLED',
            paid: 'COMPLETED',
            pending: 'PENDING',
        };

        data.forEach(function(item) {
            let newRow = `
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 py-2 text-left">
                    <td class="hidden" id="invoiceId">${item['id']}</td>
                    <td class="p-4 font-mono font-normal text-blue-900 border border-gray-300 whitespace-normal dark:text-white" id="invoiceNo"><a href="/invoice/${item['invoice_number']}" target="_blank">#${item['invoice_number']}</a></td>
                    <td class="p-4 font-mono font-medium text-gray-800 border border-gray-300 break-words whitespace-normal dark:text-white" id="clientName">${item['client']['fullname'].replace(/\b\w/g, char => char.toUpperCase())}</td>
                    <td class="p-4 font-mono font-medium text-gray-800 border border-gray-300 break-words whitespace-normal dark:text-white" id="serviceName">${item['service']['service_name']}</td>
                    <td class="p-4 font-mono font-medium text-gray-800 border border-gray-300 whitespace-nowrap dark:text-white" id="totalAmount">$${item['total_amount']}</td>
                    <td class="p-4 font-mono font-medium text-gray-800 border border-gray-300 break-words whitespace-normal dark:text-white" id="paymentMethod">${item['payment_method']['method_type'].replace(/\b\w/g, char => char.toUpperCase())} - ${item['payment_method']['provider']}</td>
                    <td class="p-4 font-mono font-medium text-gray-800 border border-gray-300 whitespace-nowrap dark:text-white" id="dueDate">${item['due_date'].split(" ")[0]}</td>
                    <td class="p-4 font-base font-medium text-gray-800 border border-gray-300 whitespace-nowrap dark:text-white" id="status">
                        <label data-id="${item['invoice_number']}" data-modal-toggle="update-status-modal" data-modal-target="update-status-modal" class="updateStatus text-xs font-bold mr-2 px-2.5 py-0.5 rounded-md ${statusClasses[item['status']]}">
                            ${status[item['status']]}
                        </label>
                    </td>
                    
                    <td class="p-4 space-x-2 whitespace-nowrap border border-gray-300">
                        <button type="button" data-id="${item['id']}" class="editBtn inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <a href="/edit-invoice/${item['invoice_number']}">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </button>
                        <button type="button" data-id="${item['id']}" class="editBtn inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white rounded-lg bg-[#037138] hover:bg-[#037310] focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <a href="/email-invoice/${item['invoice_number']}">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="#fff" d="M12 11l-8 -5h16l-8 5Z" />
                                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M4 5h16c0.55 0 1 0.45 1 1v12c0 0.55 -0.45 1 -1 1h-16c-0.55 0 -1 -0.45 -1 -1v-12c0 -0.55 0.45 -1 1 -1Z" />
                                    <path d="M3 6.5l9 5.5l9 -5.5" />
                                    </g>
                                </svg>
                            </a>
                        </button>
                        <button type="button" data-modal-target="delete-invoice-modal" data-id="${item['invoice_number']}" data-modal-toggle="delete-invoice-modal" class="deleteBtn inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </td>
                </tr>
            `;

            tableBody.append(newRow);
        });

        mainTable.DataTable({
            "order": [
                [0, "desc"]
            ]
        })
    }


    function initModals() {
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-target');
                const modal = document.getElementById(modalId);
                if (modal) {
                    const modalInstance = new Modal(modal);
                    modalInstance.show();
                }
            });
        });
    }

    $('#dataTable').on('draw.dt', function() {
        initModals();

        $('.updateStatus').off('click').on('click', function() {
            let invoiceNumber = $(this).data('id');
            $('#invoiceNumber').val(invoiceNumber);
        });

        $('.deleteBtn').off('click').on('click', function() {
            let invoiceNumber = $(this).data('id');
            $('#invoiceNumber').val(invoiceNumber);
        });
    });
</script>
@endpush