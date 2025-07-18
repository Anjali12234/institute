<form wire:submit.prevent="save">
    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3 mt-4">
        <x-wire-input 
            id="received_amount" 
            wire:model="received_amount"
            spanClass="text-red-500" 
            title="Received Amount" 
            type="number" 
            name="received_amount" 
        />

        <x-wire-input 
            id="due" 
            wire:model="due" 
            readonly
            spanClass="text-red-500" 
            title="New Due" 
            type="number" 
            name="due" 
        />

        <x-wire-input 
            id="paid_by" 
            wire:model="paid_by"
            spanClass="text-red-500" 
            title="Paid By" 
            type="text" 
            name="paid_by" 
        />

        <x-select 
            id="payment_type" 
            wire="payment_type"
            title="Payment Method" 
            :list="$paymentTypes" 
            name="payment_type" 
        />
    </div>

    <div class="mt-4">
        <x-wire-input 
            id="remarks" 
            wire:model="remarks"
            title="Remark" 
            spanClass="text-red-500" 
            type="text" 
            name="remarks" 
        />
    </div>

    <div class="flex justify-end gap-2 mt-4">
        <button type="submit"
            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
            Submit
        </button>
    </div>
</form>
