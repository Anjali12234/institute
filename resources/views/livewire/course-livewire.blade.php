<form wire:submit.prevent="save">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <h6 class="mb-4 text-15">Personal Information</h6>
    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
        <x-input-label : id="course_name"  title="Course Name" spanClass="text-red-500"
            type="text" wire="course_name" />
        <x-input-label id="fee" title="Course Fee" spanClass="text-red-500"
            type="number" wire="fee" name="fee" />
        <x-input-label : id="duration" spanClass="text-red-500" title="Duration"
            type="text" wire="duration" />
        <x-input-label : id="start_date"  spanClass="text-red-500" title="Start Date"
            type="date" wire="start_date" />
        <x-input-label : id="end_date"  spanClass="text-red-500" title="End Date"
            type="date" wire="end_date" />      
        <div class="mb-4">
            <label for="course_type" class="inline-block mb-2 text-base font-medium">
                Course Type <span>*</span>
            </label>
            <select
                class="form-select border-slate-200 dark:border-zinc-500 
                    focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
                    dark:disabled:bg-zinc-600 disabled:border-slate-300 
                    dark:disabled:border-zinc-500 dark:disabled:text-zinc-200
                    disabled:text-slate-500 dark:text-zinc-100 dark:bg-zinc-700
                    dark:focus:border-custom-800 placeholder:text-slate-400
                    dark:placeholder:text-zinc-200"
                id="course_type" wire:model="course_type">
                <option  value="">Choose...</option>               
                @foreach(\App\Enums\CourseType::cases() as $courseType)
                <option value="{{$courseType->value}}" {{old('course_type') == $courseType->value ? 'selected' : ''}}>{{$courseType->label()}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold mb-2">Required Documents</h2>
    
        @foreach ($requiredDocuments as $index => $requiredDocument)
            <div class="grid grid-cols-3 gap-4 items-center mb-2">
                <div class="col-span-2">
                    <label class="text-lg font-medium text-gray-700">Document Title</label>
                    <input type="text" wire:model="requiredDocuments.{{ $index }}.document_title" 
                        class="w-full p-2 border border-gray-300 rounded">
                </div>
                <button **type="button"** wire:click="removeRequiredDocument({{ $index }})"
                    class="px-4 py-2 mt-6  text-white rounded " style="background-color:darkslategrey">
                    Remove
                </button>
            </div>
        @endforeach
    
        <button type="button" wire:click="addRequiredDocument" 
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 mt-2">
            Add Document
        </button>
    </div>
    

    <div class="flex justify-end gap-2">
        <button type="submit"
            class="text-white mt-2 transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
    </div>
</form>
