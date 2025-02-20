@props(['id' => '', 'spanClass' => '', 'title' => '', 'type' => '', 'value' => '', 'name' => '', 'wire' => ''])

<div class="mb-4">
    <label for="{{ $id }}" class="inline-block mb-2 text-base font-medium">
        {{ $title }} <span class="{{ $spanClass }}">*</span>
    </label>
    
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        wire:model="{{ $wire }}"
        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 
            disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 
            dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
            dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
        placeholder="Enter {{ $title }}">
    
    <span class="text-warning">
        @error($name) <!-- Corrected this part -->
            {{ $message }}
        @enderror
    </span>
</div>
