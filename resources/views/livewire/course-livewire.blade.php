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
        <x-input-label : id="fee" value="{{ old('fee') }}" title="Course Fee" spanClass="text-red-500"
            type="number" wire="fee" />

        <x-input-label : id="duration" value="{{ old('duration') }}" spanClass="text-red-500" title="Duration"
            type="text" wire="duration" />
        <x-input-label : id="start_date" value="{{ old('start_date') }}" spanClass="text-red-500" title="Start Date"
            type="date" wire="start_date" />
        <x-input-label : id="end_date" value="{{ old('end_date') }}" spanClass="text-red-500" title="End Date"
            type="date" wire="end_date" />
        <x-select id="course_type" value="{{ old('course_type') }}" title="Course Type" spanClass="text-white"
            selected="old('course_type')" :list="\App\Enum\CourseType::cases()" wire:model="course_type" />

    </div>
    <h6 class="mb-4 text-15">Required Document Title</h6>
    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($requiredDocuments as $index => $requiredDocument)
            <x-input-label : title="Document Title" spanClass="text-red-500"
                wire="requiredDocuments.{{ $index }}.document_title" type="text" />
            <button type="button" wire:click="removeRequiredDocument({{ $index }})"
                class="btn btn-danger ml-2">Remove Step</button>
        @endforeach
        <button type="button" wire:click="addRequiredDocument" class="btn btn-primary mt-2">Add</button>

    </div>

    <div class="flex justify-end gap-2">
        <button type="submit"
            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
    </div>
</form>
