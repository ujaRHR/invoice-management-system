<div id="update-status-dropdown" class="absolute mt-2 z-20 hidden bg-gray-800 text-white rounded-lg shadow-lg w-44">
    <div class="px-4 py-2 font-semibold border-b border-gray-700">Update Status</div>
    <ul class="py-2 text-sm">
        <input type="hidden" id="invoiceNumber" value="">
        <li>
            <a href="#" onclick="updateStatus('paid')" class="block px-4 py-2 hover:bg-gray-700">✅ Completed</a>
        </li>
        <li>
            <a href="#" onclick="updateStatus('pending')" class="block px-4 py-2 hover:bg-gray-700">⏳ Pending</a>
        </li>
        <li>
            <a href="#" onclick="updateStatus('cancelled')" class="block px-4 py-2 hover:bg-gray-700">❌ Cancelled</a>
        </li>
    </ul>
</div>

@push('other-scripts')
<script>
    let statusDropdown = $('#update-status-dropdown');

    async function updateStatus(status) {

        let invoiceNumber = parseInt($('#invoiceNumber').val());

        try {
            const response = await axios.post('/update-status', {
                invoice_number: invoiceNumber,
                status: status
            });

            if (response.status === 200 && response.data.success === true) {
                toastr.success("Status updated successfully!");
                statusDropdown.hide();
                getInvoices();
            } else if (response.status === 202 && response.data.success === false) {
                toastr.warning("Paid status can't be updated!");
            } else {
                toastr.error("Failed to update the status!");
            }
        } catch (error) {
            toastr.error("An error occurred while updating the status.");
        }
    }
</script>
@endpush