@extends('admin.layout.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-breadcumb : list="All Bill" />

            <x-addbutton : list="Add Bill" route="{{ route('admin.bill.getStudent') }}"
                class="bg-custom-500 border-custom-500 hover:bg-custom-600 hover:border-custom-600 focus:bg-custom-600 focus:border-custom-600 focus:ring-custom-100
  active:ring-custom-100 dark:ring-custom-400/20"
                show="yes" />
            <div class="card" id="customerList">
                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap" id="customerTable">
                            <thead class="bg-slate-100 dark:bg-zink-600">
                                <tr>
                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500"
                                        scope="col" style="width: 50px">
                                        <input
                                            class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                            type="checkbox" id="checkAll" value="option" />
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="customer_name">
                                        Payment Date
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="customer_name">
                                        Student Full Name
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="customer_name">
                                        Total Fee
                                    </th>

                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Pay Amount
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Due Amount
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Payment Method
                                    </th>

                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @forelse($bills as $bill)
                                    <tr>
                                        <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500"
                                            scope="row">
                                            <input
                                                class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                                type="checkbox" name="chk_child" />
                                        </th>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id"
                                            style="display: none">
                                            <a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a>
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">
                                            {{ $bill->billing_date }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">
                                            {{ $bill->student->full_name }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">
                                            {{ $bill->student->course->fee }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $bill->received_amount }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $bill->due }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $bill->payment_type }}
                                        </td>

                                      
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                            <div class="relative dropdown">
                                                <button id="estimateAction1" data-bs-toggle="dropdown" class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="estimateAction1">
                                                    <li>
                                                        <a data-modal-target="addEstimateModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="{{ route('admin.bill.editStudent', [$bill->student_id, $bill]) }}"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <a data-modal-target="addEstimateModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="{{ route('admin.bill.editStudent', [$bill->student_id, $bill]) }}"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Show</span></a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.bill.destroy', $bill) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></button>
                                                    </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"
                                            class="px-3.5 py-2.5 border-y text-center border-slate-200 dark:border-zink-500 email">
                                            No Data found!!
                                        </td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $bills->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
