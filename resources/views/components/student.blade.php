@props([
    'students' => '',
])
@forelse ($students as $student)
    <tr>
        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
            <div class="flex items-center h-full">
                <input id="emailPerfomanceCheck1"
                    class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800"
                    type="checkbox">
            </div>
        </td>
        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
            <img src="{{ $student?->image }}" alt="">
        </td>
        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
            {{ $student->full_name }}</td>
        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
            {{ $student->email }}</td>
        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
            {{ $student->phone_number }}</td>
        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
            {{ $student?->course?->course_name }}</td>
        
        
        
    </tr>
@empty
    <tr>
        <td colspan="9"
            class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y text-center border-slate-200 dark:border-zink-500">
            Sorry! No Result Found</td>

    </tr>
@endforelse
