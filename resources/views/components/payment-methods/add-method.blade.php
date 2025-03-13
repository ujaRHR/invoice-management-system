<!-- Add method Modal -->
<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="add-method-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Add new method
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="add-method-modal" id="addMethodBtn">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form id="addMethodForm">
                    <div class="grid grid-cols-6 gap-6 mb-5">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="method_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Method Type</label>
                            <select name="method_type" id="addMethodType" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="bank">Bank</option>
                                <option value="paypal">Paypal</option>
                                <option value="crypto">Crypto</option>
                                <option value="card">Card</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provider</label>
                            <input type="text" name="porvider" id="addProvider" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Chase Bank, Bitcoin..." required>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="account_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A/C Details</label>
                            <textarea type="text" name="account_details" id="addAccountDetails" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Account Number: 1234567890, Routing: 987654321" required></textarea>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="is_default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default?</label>
                            <select name="is_default" id="addDefault" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="items-center pt-6 rounded-b dark:border-gray-700">
                        <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Add method</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('other-scripts')
<script>
    async function createMethod(event) {
        event.preventDefault();

        const formData = {
            'method_type': $('#addMethodType').val(),
            'provider': $('#addProvider').val(),
            'account_details': $('#addAccountDetails').val(),
            'is_default': $('#addDefault').val()
        };

        try {
            const response = await axios.post('/create-method', formData);

            if (response.status === 200 && response.data.success === true) {
                toastr.success("Payment method created successfully!");
                $('#addMethodBtn').click()
                const addModal = document.getElementById('add-method-modal');
                const addModalInstance = new Modal(addModal);
                addModalInstance.hide();
                $('[modal-backdrop]').remove();
                getMethods();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        } catch (error) {
            toastr.error("An error occurred while creating the method.");
        }
    }

    $('#addMethodForm').on('submit', createMethod);
</script>
@endpush