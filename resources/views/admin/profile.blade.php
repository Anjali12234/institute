@extends('admin.layout.master')

@section('container')


    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="mt-1 -ml-3 -mr-3 rounded-none card">
                <div class="card-body !px-2.5">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 2xl:grid-cols-12">
                        <div class="lg:col-span-2 2xl:col-span-1">
                            <div
                                class="relative inline-block rounded-full shadow-md size-20 bg-slate-100 profile-user xl:size-28">

                                @if (empty(Auth::user()->image))
                                    <img src="{{ asset('assets/images/avatar-1.png') }}" alt=""
                                        class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                                @else
                                    <img src="{{ $user->image }}" alt="{{$user->name}}"
                                        class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                                @endif
                                <div
                                    class="absolute bottom-0 flex items-center justify-center rounded-full size-8 ltr:right-0 rtl:left-0 profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="hidden profile-img-file-input">
                                    <label for="profile-img-file-input"
                                        class="flex items-center justify-center bg-white rounded-full shadow-lg cursor-pointer size-8 dark:bg-zink-600 profile-photo-edit">
                                        <i data-lucide="image-plus"
                                            class="size-4 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                    </label>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="lg:col-span-10 2xl:col-span-9">
                            <h5 class="mb-1">{{ Auth::user()->name }} <i data-lucide="badge-check"
                                    class="inline-block size-4 text-sky-500 fill-sky-100 dark:fill-custom-500/20"></i></h5>
                            <div class="flex gap-3 mb-4">
                                <p class="text-slate-500 dark:text-zink-200"><i data-lucide="user-circle"
                                        class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                    {{ Auth::user()->role }}</p>
                                <p class="text-slate-500 dark:text-zink-200"><i data-lucide="map-pin"
                                        class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                    {{ Auth::user()->address }}</p>
                            </div>


                        </div>

                    </div><!--end grid-->
                </div>
                <div class="card-body !px-2.5 !py-0">
                    <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">
                        <li class="group active">
                            <a href="javascript:void(0);" data-tab-toggle data-target="profileTabs"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 dark:group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Profile
                                Edit</a>
                        </li>
                        <li class="group">
                            <a href="javascript:void(0);" data-tab-toggle data-target="passwordTabs"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 dark:group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Password
                                Edit</a>
                        </li>

                    </ul>
                </div>
            </div><!--end card-->

            <div class="tab-content">
                <div class="block tab-pane" id="profileTabs">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-1 text-15">Personal Information</h6>
                            <p class="mb-4 text-slate-500 dark:text-zink-200">Update your photo and personal details here
                                easily.</p>
                            @if ($errors->any())
                                <div class="text-red-600">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{ route('admin.user.profile.update') }}" class="mt-6 space-y-6"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                    <div class="xl:col-span-6">
                                        <label for="inputValue" class="inline-block mb-2 text-base font-medium">Name</label>
                                        <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                            id="inputValue"
                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Enter your value">
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="inputValue"
                                            class="inline-block mb-2 text-base font-medium">Address</label>
                                        <input type="text" value="{{ old('address', $user->address) }}" name="address"
                                            id="inputValue"
                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Enter your value">
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="inputValue"
                                            class="inline-block mb-2 text-base font-medium">Image</label>
                                        <input type="file" name="image" id="inputValue"
                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Enter your value">
                                    </div><!--end col-->

                                    <div class="xl:col-span-6">
                                        <label for="inputValue" class="inline-block mb-2 text-base font-medium">Email
                                            Address</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                            id="inputValue"
                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Enter your email address">
                                    </div>

                                    <div class="xl:col-span-6">
                                        {{-- <x-select id="role" value="{{ old('role') }}" title="Role" spanClass=""
                                    selected="old('role')" :list="" name="role" /> --}}

                                        <div class="mb-4">
                                            <label for="role" class="inline-block mb-2 text-base font-medium">
                                                Role <span class="text-white">*</span>
                                            </label>
                                            <select
                                                class="form-select border-slate-200 dark:border-zinc-500 
                                            focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
                                            dark:disabled:bg-zinc-600 disabled:border-slate-300 
                                            dark:disabled:border-zinc-500 dark:disabled:text-zinc-200
                                            disabled:text-slate-500 dark:text-zinc-100 dark:bg-zinc-700
                                            dark:focus:border-custom-800 placeholder:text-slate-400
                                            dark:placeholder:text-zinc-200"
                                                id="role" name="role">
                                                <option selected disabled value="">Choose...</option>

                                                @foreach (\App\Enums\RoleEnum::cases() as $label)
                                                    <option value="{{ $label->value }}"
                                                        {{ old('role', $user->role) == $label->label() ? 'selected' : '' }}>
                                                        {{ $label->label() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div><!--end grid-->
                                <div class="flex justify-end mt-6 gap-x-4">
                                    <button type="submit"
                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Updates</button>
                                </div>
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end tab pane-->
                <div class="hidden tab-pane" id="passwordTabs">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Changes Password</h6>
                            <form method="post" action="{{ route('admin.user.password.update') }}"
                            class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                    <div class="xl:col-span-4">
                                        <label for="inputValue" class="inline-block mb-2 text-base font-medium">Old Password*</label>
                                        <div class="relative">
                                            <input type="password" name="current_password"
                                            value="{{ old('current_password', $user->current_password) }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="oldpasswordInput" placeholder="Enter current password">
                                            <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                        </div>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="inputValue" class="inline-block mb-2 text-base font-medium">New Password*</label>
                                        <div class="relative">
                                            <input type="password" name="password"
                                            type="password" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="oldpasswordInput" placeholder="Enter new password">
                                            <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                        </div>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="inputValue" class="inline-block mb-2 text-base font-medium">Confirm Password*</label>
                                        <div class="relative">
                                            <input type="password" name="password_confirmation" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="oldpasswordInput" placeholder="Confirm password">
                                            <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                        </div>
                                    </div><!--end col-->
                                    
                                    <div class="flex justify-end xl:col-span-6">
                                        <button type="submit" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Change Password</button>
                                    </div>
                                </div><!--end grid-->
                            </form>
                        </div>
                    </div>
                </div><!--end tab pane-->

            </div><!--end tab content-->

        </div>
        <!-- container-fluid -->
    </div>



@endsection
