@props([
    'list' => '',
    'route' => '',
    'class' => '',
    'show' => '',
    'name' => '',
])


<div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">
    <div>
        @if ($show == 'yes')
            <div class="relative xl:w-3/6">
                <input type="text"
                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                    placeholder="Search for ..." name="search" type="search" autocomplete="off"
                    value="{{ old('search', \request('search')) }}">
                <i data-lucide="search"
                    class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
            </div>
            @else
        <h6 class="mb-4 text-15">{{$name}} Form</h6>

        @endif

    </div>
    <div class="ltr:md:text-end rtl:md:text-start">
        <a href="{{ $route }}" type="button" data-modal-target="showModal"
            class="text-white btn  {{ $class }}
         hover:text-white  
         focus:text-white   focus:ring 
          active:text-white active:bg-custom-600 active:border-custom-600 active:ring 
            add-btn"
            data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="align-bottom ri-add-line me-1">
            </i>{{ $list }}</a>
        @if ($show == 'yes')
            <button type="button"
                class="text-white {{ $class }} bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20"
                onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
        @endif
    </div>
</div>
