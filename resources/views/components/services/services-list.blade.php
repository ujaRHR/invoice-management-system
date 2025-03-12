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
                            <a href="#" class="ml-1 text-gray-500 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Services</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="sm:flex">
            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                <button type="button" data-modal-target="add-service-modal" data-modal-toggle="add-service-modal" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-400 sm:w-auto dark:bg-primary-700 dark:hover:bg-primary-400">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Add New Service
                </button>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col px-[5px] pr-[5px]">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <table id="dataTable" class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-[#f3f3fe] dark:bg-gray-700">
                        <tr class="text-left">
                            <th scope="col" class="hidden border border-gray-300 p-4 font-medium text-gray-500 dark:text-gray-400">
                                ID
                            </th>
                            <th scope="col" class="border border-gray-300 w-[50%] p-4 font-medium text-gray-500 dark:text-gray-400">
                                Service Name
                            </th>
                            <th scope="col" class="border border-gray-300 w-[30%] p-4 font-medium text-gray-500 dark:text-gray-400">
                                Base Price
                            </th>
                            <th scope="col" class="border border-gray-300 w-[20%] p-4 font-medium text-gray-500 dark:text-gray-400">
                                Actions
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
    getServices();

    async function getServices() {
        let res = await axios.get('/get-services');
        let data = res.data.services;

        let mainTable = $('#dataTable');
        let tableBody = $('#tableBody');

        mainTable.DataTable().clear().destroy();
        data.forEach(function(item) {
            let newRow = `
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 py-2">
                    <td class="hidden p-4 text-base font-medium text-gray-800 border border-gray-300 whitespace-nowrap dark:text-white" id="serviceId">${item['id']}</td>
                    <td class="p-4 text-base font-medium text-gray-800 border border-gray-300 whitespace-nowrap dark:text-white" id="serviceName">${item['service_name']}</td>
                    <td class="p-4 text-base font-medium text-gray-800 border border-gray-300 whitespace-nowrap dark:text-white" id="servicePrice">${item['base_price']}</td>
                    <td class="p-4 space-x-2 whitespace-nowrap border border-gray-300">
                        <button type="button" data-modal-target="edit-service-modal" data-id="${item['id']}" data-modal-toggle="edit-service-modal" class="editBtn inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                            Edit
                        </button>
                        <button type="button" data-modal-target="delete-service-modal" data-id="${item['id']}" data-modal-toggle="delete-service-modal" class="deleteBtn inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete
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

        $('.deleteBtn').off('click').on('click', function() {
            let serviceId = $(this).data('id');
            $('#serviceId').val(serviceId);
        });

        $('.editBtn').off('click').on('click', function() {
            let serviceId = $(this).data('id');
            $('#updateServiceId').val(serviceId);
            serviceInfo();
        });
    });
</script>
@endpush