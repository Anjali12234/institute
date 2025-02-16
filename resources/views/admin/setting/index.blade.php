@extends('backend.layouts.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-frontend.breadcumb : list="System Setting" />
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Browser Default</h6>
                    <form method="post" action="{{ route('admin.systemSetting.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            <x-input-label : id="name" value="{{ old('name', $systemSetting?->name) }}" title="Name"
                                spanClass="text-red-500" type="text" />
                            <x-input-label : id="address" value="{{ old('address', $systemSetting?->address) }}"
                                spanClass="text-red-500" title="Address" type="text" />
                            <x-input-label : id="phone_number"
                                value="{{ old('phone_number', $systemSetting?->phone_number) }}" title="Phone Number"
                                spanClass="text-red-500" type="number" />
                            <x-input-label : id="telephone_number"
                                value="{{ old('telephone_number', $systemSetting?->telephone_number) }}"
                                spanClass="text-red-500" title="Telephone Number" type="text" />
                            <x-input-label : id="email" value="{{ old('email', $systemSetting?->email) }}"
                                spanClass="text-red-500" title="Email" type="email" />
                            <div>

                                <img src="{{ $systemSetting?->logo1 }}" alt="" class="h-20">

                                <x-input-label : id="logo1" value="{{ old('logo1', $systemSetting?->logo1) }}"
                                    title="Logo" spanClass="text-white" type="file" />
                            </div>
                            <div>

                                <img src="{{ $systemSetting?->logo2 }}" alt="" class="h-20">

                                <x-input-label : id="logo2" value="{{ old('logo2', $systemSetting?->logo2) }}"
                                    spanClass="text-white" title="Thumbnail" type="file" />
                            </div>
                        </div>



                        <div class="flex justify-end gap-2">

                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
        <!-- container-fluid -->
    </div>
@endsection
