<form wire:submit.prevent="save">
    <h6 class="mb-4 text-15">Personal Information</h6>
    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
        <!-- Course Name -->
        <div>
            <x-input-label id="course_name" title="Course Name" spanClass="text-red-500"
                type="text" wire:model="course_name" />
            @error('course_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Course Fee -->
        <div>
            <x-input-label id="fee" title="Course Fee" spanClass="text-red-500"
                type="number" wire:model="fee" />
            @error('fee') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Duration -->
        <div>
            <x-input-label id="duration" title="Duration" spanClass="text-red-500"
                type="text" wire:model="duration" />
            @error('duration') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Start Date -->
        <div>
            <x-input-label id="start_date" title="Start Date" spanClass="text-red-500"
                type="date" wire:model="start_date" />
            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- End Date -->
        <div>
            <x-input-label id="end_date" title="End Date" spanClass="text-red-500"
                type="date" wire:model="end_date" />
            @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Course Type -->
        <div class="mb-4">
            <label for="course_type" class="inline-block mb-2 text-base font-medium">
                Course Type <span class="text-red-500">*</span>
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
                <option value="">Choose...</option>
                @foreach(\App\Enums\CourseType::cases() as $courseType)
                    <option value="{{ $courseType->value }}">{{ $courseType->label() }}</option>
                @endforeach
            </select>
            @error('course_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Required Documents -->
    <div class="p-4 mt-6 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold mb-2">Required Documents</h2>

        @foreach ($requiredDocuments as $index => $requiredDocument)
            <div class="grid grid-cols-3 gap-4 items-center mb-2">
                <div class="col-span-2">
                    <label class="text-lg font-medium text-gray-700">Document Title</label>
                    <input type="text" wire:model="requiredDocuments.{{ $index }}.document_title"
                        class="w-full p-2 border border-gray-300 rounded">
                    @error("requiredDocuments.$index.document_title")
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="button" wire:click="removeRequiredDocument({{ $index }})"
                    class="px-4 py-2 mt-6 text-white rounded" style="background-color:darkslategrey">
                    Remove
                </button>
            </div>
        @endforeach

        <button type="button" wire:click="addRequiredDocument"
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 mt-2">
            Add Document
        </button>
    </div>

    <!-- Submit -->
    <div class="flex justify-end gap-2 mt-4">
        <button type="submit"
            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
            Submit
        </button>
    </div>
</form>
