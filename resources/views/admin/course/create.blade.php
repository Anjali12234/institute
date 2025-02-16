@extends('backend.layouts.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Course</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="{{ route('admin.course.index') }}" class="text-slate-400 dark:text-zink-200">Home</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Course
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Course Form</h6>
                    <x-input-error />
                    {{-- <form method="post" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h6 class="mb-4 text-15">Personal Information</h6>

                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                           
                            <x-input-label : id="course_name" value="{{ old('course_name') }}" title="Course Name"
                                spanClass="text-red-500" type="text" />
                            <x-input-label : id="fee" value="{{ old('fee') }}" title="Course Fee"
                                spanClass="text-red-500" type="number" />
                  
                            <x-input-label : id="duration" value="{{ old('duration') }}" spanClass="text-red-500"
                                title="Duration" type="text" />
                            <x-input-label : id="start_date" value="{{ old('start_date') }}"
                                spanClass="text-red-500" title="Start Date" type="date" />
                            <x-input-label : id="end_date" value="{{ old('end_date') }}"
                                spanClass="text-red-500" title="End Date" type="date" />
                                <x-select id="course_type" value="{{ old('course_type') }}" title="Course Type" spanClass="text-white"
                                selected="old('course_type')" :list="\App\Enum\CourseType::cases()" />

                        </div>
                        <div class="form-group col-md-12">
                            <label for="required_documents" class="inline-block mb-2 text-base font-medium">
                                Required Documents <span class="text-white">*</span>
                            </label>
                            <textarea name="required_documents" id="editor" cols="50" rows="10">{{ old('required_documents') }}</textarea>
                            <span class="text-warning">
                                @error('required_documents')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
                        </div>
                    </form> --}}
                    <livewire:course-livewire />
                </div>
            </div>
        </div>
    </div>
@endsection
