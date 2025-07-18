@extends('admin.layout.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-breadcumb : list="Student Bill" />
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Student Bill Form</h6>
                    <x-input-error />
                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-4">
                        <x-input-label : id="registration_no" value="{{ $student->registration_no }}"
                            title="Student Registration Name" spanClass="text-red-500" type="text" />
                        <x-input-label :id="'name'"
                            value="{{ $student->full_name }}"
                            title="Student Full Name" />
                        <x-input-label : id="phone_number" value=" {{ $student->phone_number }}" title="Phone Number"
                            spanClass="text-red-500" type="text" />
                        <x-input-label : id="old_due" value=" 0" title="Old Due" spanClass="text-red-500"
                            type="text" />
                    </div>
                    <form method="post" action="{{ route('admin.bill.storeStudentBill', $student) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">

                            <x-input-label : id="received_amount" value="{{ old('received_amount') }}"
                                spanClass="text-red-500" title="Received Amount" type="text" name="received_amount" />
                            <x-input-label : id="due" value="{{ old('due') }}" spanClass="text-red-500"
                                title="New Due" type="number" name="due" />
                            <x-input-label : id="paid_by" value="{{ old('paid_by') }}" spanClass="text-red-500"
                                title="Paid By" type="text" name="paid_by" />
                            <x-select id="payment_method" value="{{ old('payment_method') }}" title="Payment Method"
                                spanClass="text-white" selected="old('payment_method')" :list="\App\Enums\PaymentMethod::cases()"
                                name="payment_method" />

                        </div>
                        <div class="">
                            <x-input-label : id="remarks" value="{{ old('remarks') }}" title="Remark"
                                spanClass="text-red-500" type="text" name="remarks" />
                        </div>
                        <div class="flex justify-end gap-2">

                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>

    </div>
@endsection
