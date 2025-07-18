@props(['student'])

<tr>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
        <div class="flex items-center h-full">
            <input id="emailPerfomanceCheck1"
                class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800"
                type="checkbox">
        </div>
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
        <img src="{{ $student?->image }}" alt="{{ $student?->full_name }}" height="50" width="100">
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
        {{ $student->full_name }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
        {{ $student->email }}</td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
        {{ $student->phone_number }}</td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
        {{ $student?->course?->course_name }}</td>
    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">

        <div class="flex items-center mt-2">
            <x-input-error />

            <form action="{{ route('admin.student.updateStatus', $student) }}" method="post" class="inline">
                @csrf
                @method('put')
                <label class="relative cursor-pointer flex items-center">
                    <input type="checkbox" name="status" value="{{ old('status') }}" class="sr-only peer"
                        @if ($student->status == 1) checked @endif onchange="this.form.submit()" />

                    <div class="w-11 h-6 bg-red-700 rounded-full relative peer-checked:bg-green-700 transition">
                        <div
                            class="absolute left-0 top-1/50 -translate-y-1/2 w-6 h-6 bg-gray-300 border border-gray-300 rounded-full transition peer-checked:left-full peer-checked:-translate-x-full peer-checked:bg-green-700 peer-checked:border-[#007bff]">
                        </div>
                    </div>
                </label>
            </form>
        </div>
    </td>
    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">

        <div class="flex items-center mt-2">
            <x-input-error />

            <form action="{{ route('admin.student.updateStudentType', $student) }}" method="post" class="inline">
                @csrf
                @method('put')
                <label class="relative cursor-pointer flex items-center">
                    <input type="checkbox" name="student_type" value="{{ old('student_type') }}" class="sr-only peer"
                        @if ($student->student_type->label() == 'Enquiry') checked @endif onchange="this.form.submit()" />

                    <div class="w-11 h-6 bg-red-700 rounded-full relative peer-checked:bg-green-700 transition">
                        <div
                            class="absolute left-0 top-1/50 -translate-y-1/2 w-6 h-6 bg-gray-300 border border-gray-300 rounded-full transition peer-checked:left-full peer-checked:-translate-x-full peer-checked:bg-green-700 peer-checked:border-[#007bff]">
                        </div>
                    </div>
                </label>
            </form>
        </div>
    </td>
    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
        <div class="flex gap-2">

            <a href="{{ route('admin.student.edit', $student) }}"
                class="flex items-center justify-center text-lg border rounded-md size-12 
border-slate-200 text-slate-500 dark:border-zink-500 dark:text-zink-200"
                data-tooltip="default" data-tooltip-content="Edit Student">
                <i class="ri-ball-pen-line"></i>
            </a>
            <div class="remove">
                <form action="{{ route('admin.student.destroy', $student) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button data-modal-target="deleteRecordModal" id="delete-record" type="submit"
                        onclick="return confirm('Are You sure want to delete')" data-tooltip="default"
                        data-tooltip-content="Delete Student"
                        class="flex items-center justify-center text-lg border rounded-md size-12 
border-slate-200 text-slate-500 dark:border-zink-500 dark:text-zink-200">
                        <i class="ri-delete-bin-2-line"></i>
                    </button>
                </form>
            </div>
        </div>
    </td>
</tr>
