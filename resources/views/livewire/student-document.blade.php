<form wire:submit.prevent="save">
    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($requiredDocuments as $index => $requiredDocument)
            <input type="hidden" wire:model="requiredDocuments.{{ $index }}.document_title">

            <div class="mb-4">
                <label class="inline-block mb-2 text-base font-medium">
                    {{ $requiredDocument['document_title'] }} <span class="text-red-500">*</span>
                </label>
                <input type="file" wire:model="requiredDocuments.{{ $index }}.document" class="form-input">
                @error("requiredDocuments.$index.document") 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>
        @endforeach
    </div>

    <div class="flex justify-end gap-2">
        <button type="submit"
            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
            Submit
        </button>
    </div>
</form>
