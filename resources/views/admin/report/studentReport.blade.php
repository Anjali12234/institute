@extends('admin.layout.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-breadcumb : list="Student Report" />
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Student Report</h6>
                    <x-input-error />
                    <form method="post" action="{{ route('admin.student.report.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h6 class="mb-4 text-15">Personal Information</h6>

                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">

                            <x-input-label : id="registration_no" value="{{ old('registration_no') }}"
                                title="Registration Number" spanClass="text-red-500" type="text"
                                name="registration_no" />
                            <x-input-label : id="full_name" value="{{ old('full_name') }}" title=" Full Name"
                                spanClass="text-red-500" type="text" name="full_name" />

                            <x-input-label : id="email" value="{{ old('email') }}" title="Email"
                                spanClass="text-red-500" type="email" name="email" />
                            <x-input-label : id="d_o_b" value="{{ old('d_o_b') }}" title="Date of Birth"
                                spanClass="text-red-500" type="date" name="d_o_b" />

                            <x-input-label : id="phone_number" value="{{ old('phone_number') }}" title="Phone Number"
                                spanClass="text-red-500" type="number" name="phone_number" />

                        </div>

                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">


                            <x-select id="student_id" value="{{ old('student_id') }}" title="Reference By"
                                spanClass="text-white" selected="{{ old('student_id') }}" :students="$students"
                                name="student_id" />
                            <x-select id="gender" value="{{ old('gender') }}" title="Gender" spanClass="text-white"
                                selected="old('gender')" :list="\App\Enums\Gender::cases()" name="gender" />
                            <x-select id="student_type" value="{{ old('student_type') }}" title="Student Type" spanClass="text-white"
                                selected="old('student_type')" :list="\App\Enums\StudentType::cases()" name="student_type" />

                            <x-select id="course_id" value="{{ old('course_id') }}" title="Course" spanClass="text-white"
                                selected="{{ old('course_id') }}" :courses="$courses" name="course_id" />


                        </div>


                        <div class="flex justify-end gap-2 mt-3">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div
        class="mt-0 group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">

        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">


            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Student Report</h6>
                    @if (isset($matchedStudents) && $matchedStudents->count())
                        <div class="mt-6">
                            <h6 class="mb-4 text-15">Matched Students</h6>
                            <table class="table-auto w-full border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border p-2">Full Name</th>
                                        <th class="border p-2">Email</th>
                                        <th class="border p-2">Phone Number</th>
                                        <th class="border p-2">Gender</th>
                                        <th class="border p-2">Course</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matchedStudents as $student)
                                        <tr>
                                            <td class="border p-2">{{ $student->full_name }}</td>
                                            <td class="border p-2">{{ $student->email }}</td>
                                            <td class="border p-2">{{ $student->phone_number }}</td>
                                            <td class="border p-2">{{ $student->gender }}</td>
                                            <td class="border p-2">{{ optional($student->course)->course_name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
