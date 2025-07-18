@extends('admin.layout.master')
@section('container')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <x-breadcumb : list="System Setting" />
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Document Form</h6>
                    <x-input-error />
                    <form class="mb-5" action="{{ route('admin.studentDocument.store', $student) }}" method="Post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($requiredDocuments as $key => $requiredDocument)
                                <input type="hidden" name="documents[{{ $key }}][document_title]"
                                    value="{{ $requiredDocument->document_title }}">
                                <div class="mb-4">
                                    <label for="document_{{ $key }}"
                                        class="inline-block mb-2 text-base font-medium">
                                        {{ $requiredDocument->document_title }}<span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" id="document_{{ $key }}"
                                        name="documents[{{ $key }}][document]"  class="form-input ...">
                                </div>
                            @endforeach

                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
                        </div>
                    </form>

                    <div class="flex gap-30 mt-5">
                        @foreach ($studentDocuments as $studentDocument)
                            <div >
                                <h3 class="text-center">{{$studentDocument->document_title}}</h3>
                           
                                <a class="mt-4" href="{{$studentDocument->document}}"> <img style="height: 300px" src="{{ $studentDocument->document }}" alt="{{$studentDocument->document_title}}"></a>
                           
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
