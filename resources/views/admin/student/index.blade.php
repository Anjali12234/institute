@extends('admin.layout.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-breadcumb : list="{{ $studentType }} Student" />



            <div class="card" id="customerList">
                <div class="card-body">

                    <x-addbutton : list="Add Student" route="{{ route('admin.student.create', $studentType) }}"
                        class="bg-custom-500 border-custom-500 hover:bg-custom-600 hover:border-custom-600 focus:bg-custom-600 focus:border-custom-600 focus:ring-custom-100
              active:ring-custom-100 dark:ring-custom-400/20"
                        show="yes" />

                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead
                                class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                <tr>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        <div class="flex items-center h-full">
                                            <input id="emailPerfomanceCheckAll"
                                                class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800"
                                                type="checkbox">
                                        </div>
                                    </th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Image</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Name</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Email</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Phone number</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Course</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Status</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Student Type</th>
                                    <th
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                    <x-student :student="$student" />
                                @empty
                                    <tr>
                                        <td colspan="9"
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y text-center border-slate-200 dark:border-zink-500">
                                            Sorry! No Result Found</td>

                                    </tr>
                                @endforelse
                                {{-- @forelse ($students as $student)
                                    <tr>
                                        <td
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            <div class="flex items-center h-full">
                                                <input id="emailPerfomanceCheck1"
                                                    class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800"
                                                    type="checkbox">
                                            </div>
                                        </td>
                                        <td
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            <img src="{{ $student?->image }}" alt="{{ $student?->full_name }}"
                                                height="50" width="100">
                                        </td>
                                        <td
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $student->full_name }}{{ $student->middle_name }}{{ $student->last_name }}
                                        </td>
                                        <td
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $student->email }}</td>
                                        <td
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $student->phone_number }}</td>
                                        <td
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $student?->course?->course_name }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">

                                            <div class="flex items-center mt-2">
                                                <x-input-error />

                                                <form action="{{ route('admin.student.updateStudentType', $student) }}" method="post" class="inline">
                                                    @csrf
                                                    @method('put')
                                                    <label class="relative cursor-pointer flex items-center">
                                                        <input type="checkbox" name="status" value="{{ old('status') }}"
                                                            class="sr-only peer"
                                                            @if ($student->status == 1) checked @endif
                                                            onchange="this.form.submit()" />

                                                        <div
                                                            class="w-11 h-6 bg-red-700 rounded-full relative peer-checked:bg-green-700 transition">
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

                                                <form action="" method="post" class="inline">
                                                    @csrf
                                                    @method('put')
                                                    <label class="relative cursor-pointer flex items-center">
                                                        <input type="checkbox" name="student_type"
                                                            value="{{ old('student_type') }}" class="sr-only peer"
                                                            @if ($student->student_type->label() == 'Enquiry') checked @endif
                                                            onchange="this.form.submit()" />

                                                        <div
                                                            class="w-11 h-6 bg-red-700 rounded-full relative peer-checked:bg-green-700 transition">
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
                                                    <form action="" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-modal-target="deleteRecordModal" id="delete-record"
                                                            type="submit"
                                                            onclick="return confirm('Are You sure want to delete')"
                                                            data-tooltip="default" data-tooltip-content="Delete Student"
                                                            class="flex items-center justify-center text-lg border rounded-md size-12 
            border-slate-200 text-slate-500 dark:border-zink-500 dark:text-zink-200">
                                                            <i class="ri-delete-bin-2-line"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9"
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y text-center border-slate-200 dark:border-zink-500">
                                            Sorry! No Result Found</td>

                                    </tr>
                                @endforelse --}}


                            </tbody>
                        </table>

                    </div>


                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
