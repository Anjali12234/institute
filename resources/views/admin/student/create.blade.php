@extends('admin.layout.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-breadcumb : list="Student" />
            <x-addbutton : list="Back" route="{{route('admin.student.index',$studentType)}}"
                class="bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring-red-100
              active:ring-red-100 dark:ring-red-400/20" />
            <div class="card">
                <div class="card-body">

                    <h6 class="mb-4 text-15">Student Form</h6>
                    {{-- <x-input-error /> --}}
                    <form method="post" action="{{route('admin.student.store',$studentType)}}" enctype="multipart/form-data">
                        @csrf
                        <h6 class="mb-4 text-15">Personal Information</h6>

                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">

                            <x-input-label : id="image" value="{{ old('image') }}" title="Image"
                                spanClass="text-red-500" type="file" name="image" />
                            <x-input-label : id="full_name" value="{{ old('full_name') }}" title=" First Name"
                                spanClass="text-red-500" type="text" name="full_name" />
                            <x-input-label : id="middle_name" value="{{ old('middle_name') }}" title=" Middle Name"
                                spanClass="text-red-500" type="text" name="middle_name" />
                            <x-input-label : id="last_name" value="{{ old('last_name') }}" title="Last Name"
                                spanClass="text-red-500" type="text" name="last_name" />
                            <x-input-label : id="email" value="{{ old('email') }}" title="Email"
                                spanClass="text-red-500" type="email" name="email" />
                            <x-input-label : id="d_o_b" value="{{ old('d_o_b') }}" title="Date of Birth"
                                spanClass="text-red-500" type="date" name="d_o_b" />
                            <x-input-label : id="qualification" value="{{ old('qualification') }}" title="Qualification"
                                spanClass="text-red-500" type="text" name="qualification" />

                            <x-input-label : id="how_know" value="{{ old('how_know') }}" title="how_know"
                                spanClass="text-red-500" type="text" name="how_know" />


                            <x-input-label : id="phone_number" value="{{ old('phone_number') }}" title="Phone Number"
                                spanClass="text-red-500" type="number" name="phone_number" />

                        </div>
                        <h6 class="mb-4 text-15">Address</h6>

                        <livewire:dependent-dropdown />
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            <x-input-label : id="tole" value="{{ old('tole') }}" title="Tole"
                                spanClass="text-red-500" type="text" name="tole" />

                                <x-select id="student_id" value="{{ old('student_id') }}" title="Reference By"
                                spanClass="text-white"
                                selected="{{ old('student_id') }}"
                                :students="$students"
                                name="student_id" />
                            <x-select id="gender" value="{{ old('gender') }}" title="Gender" spanClass="text-white"
                                selected="old('gender')" :list="\App\Enums\Gender::cases()" name="gender" />

                                <x-select id="course_id" value="{{ old('course_id') }}" title="Course"
                                spanClass="text-white"
                                selected="{{ old('course_id') }}"
                                :courses="$courses"
                                name="course_id" />


                        </div>
                        <h6 class="mb-4 text-15">Parent And Guardian's Details</h6>

                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">


                            <x-input-label : id="parent_name" value="{{ old('parent_name') }}" title=" Parent Name"
                                spanClass="text-red-500" type="text" name="parent_name" />

                            <x-input-label : id="parent_contact_number" value="{{ old('parent_contact_number') }}"
                                title="Parent Contact Number" spanClass="text-red-500" type="number"
                                name="parent_contact_number" />

                            <x-input-label : id="guardian_name" value="{{ old('guardian_name') }}"
                                title=" Guardian Name" spanClass="text-red-500" type="text" name="guardian_name" />

                            <x-input-label : id="guardian_contact_number" value="{{ old('guardian_contact_number') }}"
                                title="Guardian Contact Number" spanClass="text-red-500" type="number"
                                name="guardian_contact_number" />
                        </div>
                        <div class="form-group col-md-12">
                            <x-input-label : id="remarks" value="{{ old('remarks') }}"
                            title="Remark" spanClass="text-red-500" type="text" name="remarks" />



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
@endsection
