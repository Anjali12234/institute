@extends('backend.layouts.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu 
group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md 
group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm 
pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 
group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 
group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl 
group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto 
group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto 
group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] 
group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <x-frontend.breadcumb : list="Course List" />
            <div class="card" id="customerList">
                <div class="card-body">
                    <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">
                        <div>
                            <div class="relative xl:w-3/6">
                                <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                            </div>
                        </div>
                        <div class="ltr:md:text-end rtl:md:text-start"> 
                            <a href="{{route('admin.course.create')}}" type="button" data-modal-target="showModal" class="text-white btn bg-custom-500 
                            border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600
                             focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                              active:text-white active:bg-custom-600 active:border-custom-600 active:ring 
                              active:ring-custom-100 dark:ring-custom-400/20 add-btn" data-bs-toggle="modal"
                               id="create-btn" data-bs-target="#showModal"><i class="align-bottom ri-add-line me-1">
                                </i> Add Customer</a>
                            <button type="button" class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>

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
                                        Course Name
                                    </th>
                                    
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Type
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Course Fee
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Status
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                        data-sort="phone">
                                        Action
                                    </th>

                                  
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @forelse($courses as $course)
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
                                            {{ $course->course_name }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $course->course_type->label() }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            {{ $course->fee }}
                                        </td>
                                       
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 ">
                   
                                            <div class="flex items-center mt-2">
                                                <x-input-error />

                                                <form action="{{ route('admin.course.updateStatus', $course) }}"
                                                    method="post" class="inline">
                                                    @csrf
                                                    @method('put')
                                                    <label class="relative cursor-pointer flex items-center">
                                                        <input type="checkbox" name="status" value="1"
                                                            class="sr-only peer"
                                                            @if ($course->status == 1) checked @endif
                                                            onchange="this.form.submit()" />

                                                        <div
                                                            class="w-11 h-6 bg-red-700 rounded-full relative peer-checked:bg-green-700 transition">
                                                            <div
                                                                class="absolute left-0 top-1/2 -translate-y-1/2 w-6 h-6 bg-gray-300 border border-gray-300 rounded-full transition peer-checked:left-full peer-checked:-translate-x-full peer-checked:bg-green-700 peer-checked:border-[#007bff]">
                                                            </div>
                                                        </div>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            <div class="flex gap-2">
                                                <div class="edit">
                                                    <a href="{{ route('admin.course.edit', $course) }}"
                                                        data-modal-target="showModal"
                                                        class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="remove">
                                                    <form action="{{ route('admin.course.destroy', $course) }}"
                                                        method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-modal-target="deleteRecordModal" id="delete-record"
                                                            type="submit"
                                                            onclick="return confirm('Are You sure want to delete')"
                                                            class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">
                                                            Remove
                                                        </button>
                                                    </form>
                                                </div>
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

                    </div>

                    <div class="flex justify-end mt-4">
                        <div class="flex gap-2 pagination-wrap">
                            <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-prev disabled"
                                href="#">
                                Previous
                            </a>
                            <ul class="flex gap-2 mb-0 pagination listjs-pagination"></ul>
                            <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-next"
                                href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
