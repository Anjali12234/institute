@props([
    'list'
    
])


<div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
    <div class="grow">
        <h5 class="text-16">{{$list}}</h5>
    </div>
    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
            <a href="{{route('admin.dashboard')}}" class="text-slate-400 dark:text-zink-200">Home</a>
        </li>
        <li class="text-slate-700 dark:text-zink-100">
            {{$list}}
        </li>
    </ul>
</div>