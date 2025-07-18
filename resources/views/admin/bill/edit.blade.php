@extends('admin.layout.master')

@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <x-breadcumb :list="'Student Bill'" />
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Edit Student Bill Form</h6>
                    <x-input-error />
                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-4 mb-6">
                        <x-input-label :id="'registration_no'" value="{{ $student->registration_no }}"
                            title="Student Registration No" spanClass="text-red-500" type="text" :disabled="true"  />
                        <x-input-label :id="'name'"
                            value="{{ $student->full_name }} "
                            title="Student Full Name" :disabled="true" />
                        <x-input-label :id="'phone_number'" value="{{ $student->phone_number }}" title="Phone Number"
                            spanClass="text-red-500" type="text" :disabled="true"  />
                        <x-input-label :id="'old_due'" value="{{ $oldDue }}" title="Old Due"
                            spanClass="text-red-500" type="text" :disabled="true" />
                    </div>
                    @livewire('student-form-livewire', ['student' => $student, 'bill' => $bill])

                </div>
            </div>
        </div>
    </div>
@endsection