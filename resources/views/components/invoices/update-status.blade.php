<!-- update status Modal -->
<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="update-status-modal">
    <div class="relative w-full h-full max-w-md px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex justify-end p-2">
                <button type="button" id="modalCloseBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-hide="update-status-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 pt-0 text-center">
                <svg class="w-16 h-16 mx-auto text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
                    <path fill="currentColor" d="M1024 0q141 0 272 36t244 104t207 160t161 207t103 245t37 272q0 141-36 272t-104 244t-160 207t-207 161t-245 103t-272 37q-141 0-272-36t-244-104t-207-160t-161-207t-103-245t-37-272q0-141 36-272t104-244t160-207t207-161T752 37t272-37m0 1558q77 0 149-21t136-62t114-96t84-126l-156-74q-23 47-57 85t-77 65t-92 42t-101 15q-72 0-137-28t-117-78h126v-128H512v384h128v-142q75 78 175 121t209 43m512-662V512h-128v142q-75-78-175-121t-209-43q-77 0-149 21t-136 62t-114 96t-84 126l156 74q22-47 56-85t78-65t92-42t101-15q72 0 137 28t117 78h-126v128z" />
                </svg>
                <h3 class="mt-5 mb-6 text-lg font-semibold text-gray-500 dark:text-gray-400">Update Invoice Status</h3>
                <input type="hidden" id="invoiceNumber" value="">
                <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                    <button onclick="updateStatus('paid')" class="w-full sm:w-auto text-green-800 bg-green-200 hover:bg-green-300 font-medium rounded-lg text-base px-4 py-2 text-center">
                        Completed
                    </button>
                    <button onclick="updateStatus('pending')" class="w-full sm:w-auto text-orange-800 bg-orange-200 hover:bg-orange-300 font-medium rounded-lg text-base px-4 py-2 text-center">
                        Pending
                    </button>
                    <button onclick="updateStatus('cancelled')" class="w-full sm:w-auto text-red-800 bg-red-200 hover:bg-red-300 font-medium rounded-lg text-base px-4 py-2 text-center">
                        Cancelled
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('other-scripts')
<script>
    async function closeModal() {
        const statusModal = document.getElementById('status-update-modal');
        const statusModalInstance = new Modal(statusModal);
        statusModalInstance.hide();
        $('[modal-backdrop]').remove();
        getInvoices();
    }

    async function updateStatus(status) {
        let invoiceNumber = parseInt($('#invoiceNumber').val());

        try {
            const response = await axios.post('/update-status', {
                invoice_number: invoiceNumber,
                status: status
            });

            if (response.status === 200 && response.data.success === true) {
                toastr.success("Status updated successfully!");
                closeModal()
            } else if (response.status === 202 && response.data.success === false) {
                toastr.warning("Paid status can't be updated!");
                closeModal()
            } else {
                toastr.error("Something went wrong, Try again!");
                closeModal()
            }
        } catch (error) {
            toastr.error("An error occurred while updating the status.");
            closeModal()
        }
    }
</script>

@endpush