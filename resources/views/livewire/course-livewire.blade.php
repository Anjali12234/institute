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

        <x-input-label : id="course_name" value="{{ old('course_name') }}" title="Course Name" spanClass="text-red-500"
            type="text" wire="course_name" />
        <x-input-label id="fee" value="{{ old('fee') }}" title="Course Fee" spanClass="text-red-500"
    type="number" wire="fee" name="fee"/>


        <x-input-label : id="duration" value="{{ old('duration') }}" spanClass="text-red-500" title="Duration"
            type="text" wire="duration" />
        <x-input-label : id="start_date" value="{{ old('start_date') }}" spanClass="text-red-500" title="Start Date"
            type="date" wire="start_date" />
        <x-input-label : id="end_date" value="{{ old('end_date') }}" spanClass="text-red-500" title="End Date"
            type="date" wire="end_date" />
        {{-- <x-select id="course_type" value="{{ old('course_type') }}" title="Course Type" spanClass="text-white"
            selected="old('course_type')" :list="\App\Enum\CourseType::cases()" wire="course_type" /> --}}
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
                    id="course_type"  wire:model="course_type">
                    <option selected disabled value="">Choose...</option>
                    @foreach (\App\Enum\CourseType::cases() as $label)
                        <option value="{{ $label->value }}" 
                            {{ old('course_type') == $label->value ? 'selected' : '' }}>
                            {{ $label->label() }}
                        </option>
                    @endforeach
                    
                </select>
            </div>
    </div>
    <h6 class="mb-4 text-15">Required Document Title</h6>
    <div class="">
        @foreach ($requiredDocuments as $index => $requiredDocument)
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                <x-input-label : title="Document Title" spanClass="text-red-500"
                    wire="requiredDocuments.{{ $index }}.document_title" type="text" />
                <button wire:click="removeRequiredDocument({{ $index }})"
                    class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500
                     hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 
                     focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 
                     active:border-custom-600 active:ring active:ring-custom-100">Remove </button>
            </div>
        @endforeach
        <button type="button" wire:click="addRequiredDocument" class="btn btn-primary mt-2">Add</button>

    </div>

    <div class="flex justify-end gap-2">
        <button type="submit"
            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
    </div>
</form>
